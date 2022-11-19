<?php

namespace App\DataTables;

use Carbon\Carbon;
use App\Models\Task;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

/**
 * This class contains methods for building datatables for the developers task list view
 *
 * @author  Aditya Zanjad <adityazanjad474@gmail.com>
 * @version 1.0
 * @access  public
 */
class DeveloperTasksDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setTransformer(function ($task) {
                return $this->getTransformedModelData($task);
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Task $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Task $model): QueryBuilder
    {
        return $model->where('user_id', auth()->id())
            ->select(['id', 'name', 'completed', 'created_at']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('developer_tasks-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                ->addClass('text-center'),

            Column::make('name')
                ->addClass('text-center'),

            Column::make('completed')
                ->addClass('text-center'),

            Column::make('created_at')
                ->addClass('text-center'),
        ];
    }

    /**
     * Transform data & return it as an array.
     *
     * @param \App\Models\User $user
     *
     * @return array<string, mixed>
     */
    private function getTransformedModelData(Task $task): array
    {
        return [
            'id'            =>  $task->id,
            'name'          =>  $task->name,
            'completed'     =>  $task->completed ? 'true' : 'false',
            'created_at'    =>  Carbon::parse($task->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
