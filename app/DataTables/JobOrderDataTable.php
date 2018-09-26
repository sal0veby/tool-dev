<?php

namespace App\DataTables;

use App\Models\JobOrder;
use Carbon\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class JobOrderDataTable extends DataTable
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
            ->editColumn('coming_work_date', function ($model) {
                return Carbon::parse($model->coming_work_date)
                    ->format(config('date.default_date_format'));
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
     * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\QueryDataTable
     */
    public function query()
    {
        $query = JobOrder::select('*')->orderBy('created_at', 'DESC');

//        if (request()->has('custom_search')) {
//            $query->where('name', 'LIKE', "%" . request()->input('custom_search') . "%");
//        }

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
        $route = route('class.view', [$model->id]);

        $attributes = [
            'id' => "button-edit-{$model->id}",
            'class' => 'btn btn-info m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill',
            'style' => 'margin-right:10px;',
            'data-toggle' => 'tooltip',
            'data-original-title' => trans('main.view'),
        ];

        if ($model->process_id != 1 && !in_array($model->state_id, [1, 2])) {
            if (session()->get('permission.7.use') == false) {
                $attributes = [
                    'class' => 'btn btn-info m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill disabled',
                    'disabled' => 'disabled',
                    'style' => 'margin-right:10px;',
                ];

                $route = '#';
            }
        }

        return link_to($route, "<i class='fa fa-eye'></i>", $attributes, false, false);

    }

    private function editButton($model): string
    {
        $route = route('job_list.edit', [$model->id]);

        $attributes = [
            'id' => "button-edit-{$model->id}",
            'class' => 'btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill',
            'style' => 'margin-right:10px;',
            'data-toggle' => 'tooltip',
            'data-original-title' => trans('main.edit'),
        ];

        if ($model->process_id != 1 && !in_array($model->state_id, [1, 2])) {
            if (session()->get('permission.7.update') == false) {
                $attributes = [
                    'class' => 'btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill disabled',
                    'disabled' => 'disabled',
                ];

                $route = '#';
            }
        }

        return link_to($route, "<i class='fa fa-edit'></i>", $attributes, false, false);

    }

    private function deleteButton($model): string
    {
        $attributes = [
            'class' => 'btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill btn-delete',
            'data-toggle' => 'tooltip',
            'data-original-title' => trans('main.delete'),
            'data-url' => route('class.delete', [$model->id]),
        ];

        if ($model->process_id != 1 && !in_array($model->state_id, [1, 2])) {
            if (session()->get('permission.7.delete') == false) {
                $attributes = [
                    'class' => 'btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill btn-delete disabled',
                    'disabled' => 'disabled',
                ];
            }
        }

        return link_to('#', "<i class='fa fa-trash'></i>", $attributes, false, false);
    }

    protected function getColumns()
    {
        return [
            ['data' => 'DT_Row_Index', 'name' => 'id', 'title' => trans('main.number_no'), "className" => "align-middle"],
            ['data' => 'document_no', 'name' => 'name', 'title' => trans('main.document_no'), "className" => "align-middle"],
            ['data' => 'reference_no', 'name' => 'name', 'title' => trans('main.reference_no'), "className" => "align-middle"],
            ['data' => 'coming_work_date', 'name' => 'name', 'title' => trans('main.coming_work_date'), "className" => "align-middle"],
//            [
//                'data' => 'active',
//                'name' => 'active',
//                'title' => trans('main.active'),
//                "className" => "text-center align-middle",
//                'defaultContent' => ''
//            ],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => trans('main.created_at'), "className" => "align-middle"],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => trans('main.updated_at'), "className" => "align-middle"],
        ];
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
}
