<?php

namespace App\DataTables;

use Spatie\Permission\Models\Role;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class RoleDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'roles.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Spatie\Permission\Models\Role $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'stateSave' => false,
                'order'     => [[1, 'desc']],
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
            trans('role.fields.role.name')   => ['name' => 'name', 'data' => 'name'],
            'id' => ['name' => 'id', 'data' => 'id', 'visible' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return '$MODEL_NAME_PLURAL_SNAKE_$datatable_' . time();
    }
}
