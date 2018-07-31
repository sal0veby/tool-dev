<?php

namespace App\DataTables;

use App\Models\UserModel;
use App\Models\UserPermission;
use App\User;
use Carbon\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class UserPermissionDataTable extends DataTable
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
            ->editColumn('first_name', function ($model) {
                return $model->first_name . " " . $model->last_name;
            })
            ->editColumn('created_at', function ($model) {
                return Carbon::parse($model->created_at)
                    ->format(config('date.default_date_format'));
            })
            ->editColumn('updated_at', function ($model) {
                return Carbon::parse($model->updated_at)
                    ->format(config('date.default_date_format'));
            })
            ->rawColumns(['action'])
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
        $query = UserModel::query()->select('*')->orderBy('id', 'ASC');
        if (request()->has('custom_search')) {
            $query->where('first_name', 'LIKE', "%" . request()->input('custom_search') . "%");
            $query->orWhere('last_name', 'LIKE', "%" . request()->input('custom_search') . "%");
            $query->orWhere('username', 'LIKE', "%" . request()->input('custom_search') . "%");
        }
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
            ->minifiedAjax('', '
                data.custom_search = $("#custom_search").val();
            ')
            ->addAction(['width' => '110px'])
            ->parameters($this->getBuilderParameters());
    }

    protected function getActionButtons($model)
    {
        return implode('&nbsp;', [
            $this->viewToFrontend($model),
            $this->editButton($model)
//            $this->deleteButton($model)
        ]);
    }

    private function viewToFrontend($model): string
    {
        $route = route('user_permission.view', [$model->id]);

        $attributes = [
            'id' => "button-edit-{$model->id}",
            'class' => 'btn btn-info m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill',
            'style' => 'margin-right:10px;',
            'data-toggle' => 'tooltip',
            'data-original-title' => trans('main.view'),
        ];

        if (session()->get('permission.12.use') == false) {
            $attributes = [
                'class' => 'btn btn-info m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill disabled',
                'disabled' => 'disabled',
            ];
        }

        return link_to($route, "<i class='fa fa-eye'></i>", $attributes, false, false);

    }

    private function editButton($model): string
    {
        $route = route('user_permission.edit', [$model->id]);

        $attributes = [
            'id' => "button-edit-{$model->id}",
            'class' => 'btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill',
            'style' => 'margin-right:10px;',
            'data-toggle' => 'tooltip',
            'data-original-title' => trans('main.edit'),
        ];

        if (session()->get('permission.12.update') == false) {
            $attributes = [
                'class' => 'btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill disabled',
                'disabled' => 'disabled',
            ];
        }

        return link_to($route, "<i class='fa fa-edit'></i>", $attributes, false, false);
    }

    private function deleteButton($model): string
    {
        $attributes = [
            'class' => 'btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill btn-delete',
            'data-toggle' => 'tooltip',
            'data-original-title' => trans('main.delete'),
            'data-url' => route('user_permission.delete', [$model->id]),
        ];

        if (session()->get('permission.12.delete') == false) {
            $attributes = [
                'class' => 'btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill btn-delete disabled',
                'disabled' => 'disabled',
            ];
        }

        return link_to('#', "<i class='fa fa-trash'></i>", $attributes, false, false);
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
            ['data' => 'DT_Row_Index', 'name' => 'id', 'title' => trans('main.number_no'), "className" => "align-middle"],
            ['data' => 'username', 'name' => 'username', 'title' => trans('main.username'), "className" => "align-middle"],
            ['data' => 'first_name', 'name' => 'name', 'title' => trans('main.name'), "className" => "align-middle"],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => trans('main.created_at'), "className" => "align-middle"],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => trans('main.updated_at'), "className" => "align-middle"],
        ];
    }
}
