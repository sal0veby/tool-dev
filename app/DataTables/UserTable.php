<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;

class UserTable extends DataTable
{
    public function ajax()
    {
        return $this->dataTable($this->query())
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return $this->getActionButtons($model);
            })
            ->setRowClass('text-center')
            ->editColumn('active', function ($model) {
                if ($model->active == 1) {
                    return '<span class="m-badge  m-badge--success m-badge--wide">Yes</span>';
                } else {
                    return '<span class="m-badge  m-badge--danger m-badge--wide">No</span>';
                }
            })
            ->rawColumns(['active', 'action'])
            ->make(true);
    }

    public function dataTable($query)
    {
        return new EloquentDataTable($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = User::orderBy('id', 'ASC');
        return $this->applyScopes($query);
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
            ->addAction(['width' => '110px'])
            ->parameters($this->getBuilderParameters());
    }

    protected function getActionButtons($model)
    {
        return implode('&nbsp;', [
            $this->viewToFrontend($model),
            $this->editButton($model),
            $this->deleteButton($model)
        ]);
    }

    private function viewToFrontend($model): string
    {
        $link = url(route('user.view', [
            'id' => $model->id
        ]));

        return link_to($link, "<i class='fa fa-eye'></i>", [
            'id' => "button-edit-{$model->id}",
            'class' => 'btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill',
            'style' => 'margin-right:10px;',
            'data-toggle' => 'tooltip',
            'data-original-title' => 'View',
//            'target' => '_blank',
        ], false, false);
    }

    private function editButton(\App\Model\User $model)
    {
        $route = route('user.edit', [$model->id]);

        return link_to($route, "<i class='fa fa-edit'></i>", [
            'id' => "button-edit-{$model->id}",
            'class' => 'btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill',
            'style' => 'margin-right:10px;',
            'data-toggle' => 'tooltip',
            'data-original-title' => 'Edit',
        ], false, false);
    }

    private function deleteButton(\App\Model\User $model)
    {
        $route = route('user.delete', [$model->id]);

        $attributes = [
            'class' => 'btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill btn-delete',
            'data-toggle' => 'tooltip',
            'data-original-title' => 'Delete',
            'data-url' => route('user.delete', [$model->id]),
        ];

//        if ($model->isUsed()) {
//            $attributes = [
//                'class' => 'btn btn-xs btn-danger',
//                'disabled' => 'disabled',
//            ];
//        }
        if ($model->default == true) {
            return '';
        } else {
            return link_to($route, "<i class='fa fa-trash'></i>", $attributes, false, false);
        }
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'add your columns',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'DataTables/UserTable_' . date('YmdHis');
    }
}
