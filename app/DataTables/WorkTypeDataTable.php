<?php

namespace App\DataTables;

use App\Models\WorkType;
use Carbon\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class WorkTypeDataTable extends DataTable
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
                    return '<span class="m-badge  m-badge--success m-badge--wide">' . trans('main.active_yes') . '</span>';
                } else {
                    return '<span class="m-badge  m-badge--danger m-badge--wide">' . trans('main.active_no') . '</span>';
                }
            })
            ->editColumn('created_at', function ($model) {
                return Carbon::parse($model->created_at)
                    ->format(config('date.default_date_format'));
            })
            ->editColumn('updated_at', function ($model) {
                return Carbon::parse($model->updated_at)
                    ->format(config('date.default_date_format'));
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
        $query = WorkType::with('class_name', 'location')->orderBy('name', 'ASC');

        if (request()->has('custom_search')) {
            $request = request()->input('custom_search');
            $query->whereHas('class_name', function ($q) use ($request) {
                $q->where('name', 'LIKE', "%" . $request . "%");
            });
            $query->whereHas('location', function ($q) use ($request) {
                $q->where('name', 'LIKE', "%" . $request . "%");
            });
            $query->orWhere('name', 'LIKE', "%" . $request . "%");
        }

        return $this->applyScopes($query);
    }

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
            $this->editButton($model),
            $this->deleteButton($model)
        ]);
    }

    private function viewToFrontend($model): string
    {
        $route = route('work_type.view', [$model->id]);

        $attributes = [
            'id' => "button-edit-{$model->id}",
            'class' => 'btn btn-info m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill',
            'style' => 'margin-right:10px;',
            'data-toggle' => 'tooltip',
            'data-original-title' => trans('main.view'),
        ];

        if (session()->get('permission.7.use') == false) {
            $attributes = [
                'class' => 'btn btn-info m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill disabled',
                'disabled' => 'disabled',
            ];

            $route = '#';
        }

        return link_to($route, "<i class='fa fa-eye'></i>", $attributes, false, false);

    }

    private function editButton($model): string
    {
        $route = route('work_type.edit', [$model->id]);

        $attributes = [
            'id' => "button-edit-{$model->id}",
            'class' => 'btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill',
            'style' => 'margin-right:10px;',
            'data-toggle' => 'tooltip',
            'data-original-title' => trans('main.edit'),
        ];

        if (session()->get('permission.7.update') == false) {
            $attributes = [
                'class' => 'btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill disabled',
                'disabled' => 'disabled',
            ];

            $route = '#';
        }

        return link_to($route, "<i class='fa fa-edit'></i>", $attributes, false, false);

    }

    private function deleteButton($model): string
    {
        $attributes = [
            'class' => 'btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill btn-delete',
            'data-toggle' => 'tooltip',
            'data-original-title' => trans('main.delete'),
            'data-url' => route('work_type.delete', ['id' => $model->id]),
        ];

        if (session()->get('permission.7.delete') == false) {
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
            "responsive" => true,
            'ordering' => false
        ];
    }

    protected function getColumns()
    {
        return [
            ['data' => 'DT_Row_Index', 'name' => 'id', 'title' => trans('main.number_no'), "className" => "align-middle"],
            ['data' => 'class_name.name', 'name' => 'class_name.name', 'title' => trans('main.class_name'), "className" => "align-middle"],
            ['data' => 'location.name', 'name' => 'location.name', 'title' => trans('main.location_name'), "className" => "align-middle"],
            ['data' => 'name', 'name' => 'name', 'title' => trans('main.work_type_name'), "className" => "align-middle"],
            [
                'data' => 'active',
                'name' => 'active',
                'title' => trans('main.active'),
                "className" => "text-center align-middle",
                'defaultContent' => ''
            ],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => trans('main.created_at'), "className" => "align-middle"],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => trans('main.updated_at'), "className" => "align-middle"],
        ];
    }
}
