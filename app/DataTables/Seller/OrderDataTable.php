<?php

namespace App\DataTables\Seller;

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
            ->addColumn('action', 'seller.orders.action')
            ->addColumn('checkbox', 'admin.orders.checkbox')
            ->rawColumns([
                'action',
                'checkbox'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Order::select('orders.id', 'barcode', 'phone', 'client_name', 'price', 'address', 'notes', 'orders.shipping_price', 'city_id', 'status_id')
            ->where('seller_id', auth('seller')->user()->id)
            ->with('city:id,name')
            ->with('status:id,name')
            ->with('seller:id,company_name')
            ->orderBy('orders.id', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('order-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('excel')->text('<i class="fa fa-file-excel-o"> Excel')->className('btn btn-success'),
                        Button::make('reload'),
                        Button::raw(['text' => 'Print Selected', 'className' => 'printBtn btn btn-primary']),
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
            Column::computed('checkbox')
                ->title('<input type="checkbox" class="check-all" onclick="checkAll()"/>')
                ->exportable(false)
                ->orderable(false)
                ->searchable(false),
            Column::make('barcode'),
            Column::make('client_name'),
            Column::make('phone'),
            Column::make('City')->name('city.name')->data('city.name'),
            Column::make('address')->render(function(){
                return 'function(data){ return `<span title="${data}" data-toggle="tooltip">${data.substr(0, 35)}...</span>`}';
            }),
            Column::make('Status')->name('status.name')->data('status.name'),
            Column::make('price')->render(function(){
                return "function(data){ return data.toLocaleString() + ' <span class=\"curreny\">EGP</span>' }";
            }),
            Column::make('shipping_price')->render(function(){
                return "function(data){ return data.toLocaleString() + ' <span class=\"curreny\">EGP</span>' }";
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
        return 'Order_' . date('YmdHis');
    }
}
