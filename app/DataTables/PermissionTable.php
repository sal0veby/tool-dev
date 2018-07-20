<?php

namespace App\DataTables;

use App\Models\Permission;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class PermissionTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
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
     * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\QueryDataTable
     */
    public function query()
    {
        $query = Permission::query()->select(['id', 'name', 'active'])->whereNull('parent_id')->orderBy('name', 'ASC');
        return $this->applyScopes($query);
    }

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
        $link = url(route('permission.view', [
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

    private function editButton(Permission $model)
    {
        $route = route('permission.edit', [$model->id]);

        return link_to($route, "<i class='fa fa-edit'></i>", [
            'id' => "button-edit-{$model->id}",
            'class' => 'btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill',
            'style' => 'margin-right:10px;',
            'data-toggle' => 'tooltip',
            'data-original-title' => 'Edit',
        ], false, false);
    }

    private function deleteButton(Permission $model)
    {
        $route = route('permission.delete', [$model->id]);

        $attributes = [
            'class' => 'btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill btn-delete',
            'data-toggle' => 'tooltip',
            'data-original-title' => 'Delete',
            'data-url' => route('permission.delete', [$model->id]),
        ];

//        if ($model->isUsed()) {
//            $attributes = [
//                'class' => 'btn btn-xs btn-danger',
//                'disabled' => 'disabled',
//            ];
//        }
        return link_to($route, "<i class='fa fa-trash'></i>", $attributes, false, false);
    }

    protected function getBuilderParameters()
    {
        return [
            'order' => [[0, 'desc']],
            'dom' => 'Bfrtip',
            'buttons' => ['reload'],
            'processing' => true,
            'pageLength' => 20,
            'bAutoWidth' => false,
            'info' => false,
            'searching' => false,
            "responsive" => true
        ];
    }

    protected function getColumns()
    {
        return [
            ['data' => 'DT_Row_Index', 'name' => 'id', 'title' => 'No.', "className" => "align-middle"],
            ['data' => 'name', 'name' => 'name', 'title' => 'Permission name', "className" => "align-middle"],
            [
                'data' => 'active',
                'name' => 'active',
                'title' => 'Active',
                "className" => "text-center align-middle",
                'defaultContent' => ''
            ],
        ];
    }


}