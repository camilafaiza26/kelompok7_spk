<?php

namespace App\DataTables;

use App\Models\Kriteria;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class KriteriasDataTable extends DataTable
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
        ->addColumn('action', 'kriteria.action')
        ->rawColumns(['action']);
            
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Kriteria $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $model = Kriteria::select('*');
        return $this->applyScopes($model);
    }
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('dataTable2')
                    ->columns($this->getColumns())
                    ->minifiedAjax()            
                    ->parameters([
                        "processing" => true,
                        "autoWidth" => false,
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => 'id'],
            ['data' => 'nama', 'name' => 'nama', 'title' => 'Nama Kriteria', 'orderable' => false],
            
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->searchable(false)
                  ->width(60)
                  ->addClass('text-center hide-search'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Kriteria_' . date('YmdHis');
    }
}
