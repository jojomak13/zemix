<?php

namespace App\DataTables;

use App\Seller;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SellerDataTable extends DataTable
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
            ->addColumn('action', 'admin.sellers.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Seller $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Seller::with(['city:id,name']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('sellerdatatable-table')
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
            Column::make('name'),
            Column::make('company_name'),
            Column::make('phone'),
            Column::make('City')->name('city.name')->data('city.name'),
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
        return 'Seller_' . date('YmdHis');
    }
}
