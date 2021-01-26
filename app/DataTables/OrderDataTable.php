<?php

namespace App\DataTables;

use App\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admin.orders.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {   
        return Order::select('orders.id', 'price',  'orders.shipping_price', 'city_id', 'status_id', 'driver_id', 'seller_id')
            ->with('city:id,name')
            ->with('status:id,name')
            ->with('driver:id,name')
            ->with('seller:id,company_name');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('orders-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'desc')
            ->buttons(
                Button::make('excel')->text('<i class="fa fa-file-excel"> Excel'),
                Button::make('print')->text('<i class="fa fa-print"> Print'),
                Button::make('reload')->text('<i class="fa fa-sync-alt"></i> Reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('#')->data('id')->name('id'),
            Column::make('Company')->data('seller.company_name')->name('seller.company_name'),
            Column::make('Price')->data('price'),
            Column::make('Shipping')->data('shipping_price')->name('shipping_price'),
            Column::make('City')->data('city.name')->name('city.name'),
            Column::make('Status')->data('status.name')->name('status.name'),
            Column::make('Driver')->data('driver.name')->name('driver.name')->render(function(){
                return 'function(data,type,full,meta){ return data || "Not Set"; }';
            }),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Orders_' . date('YmdHis');
    }
}
