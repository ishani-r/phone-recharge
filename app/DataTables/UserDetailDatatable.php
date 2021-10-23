<?php

namespace App\DataTables;

use App\Models\UserDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDetailDatatable extends DataTable
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
            // ->addColumn('action', 'userdetaildatatable.action')
            ->addColumn('action', function($data){
                $result = '<div class="btn-group">';
                $result .= '<a href="'.route('admin.details.show',$data->id).'"><button class="btn-sm btn-outline-warning" style="border-radius: 2.1875rem;"><i class="fa fa-eye" aria-hidden="true"></i></button></a>';
                // $result .= '<a href="'.route('admin.dashboard.edit',$data->id).'"><button class="btn-sm btn-outline-info">Edit</button></a>';
                $result .= '<button type="submit" data-id="'.$data->id.'" class="btn-sm btn-outline-danger delete" style="border-radius: 2.1875rem;"><i class="fa fa-trash" aria-hidden="true"></i></button></form></div>';
                return $result;
            })

            ->editColumn('user_id', function($data){
                return $data->user['name'];
            })

            ->editColumn('status', function ($data) {
                if($data['status'] == 'Active')
                {
                    return '<button type="button" data-id="'.$data->id.'" class="badge rounded-pill bg-success status"> Active </button>';
                }else{
                    return '<button type="button" data-id="'.$data->id.'" class="badge rounded-pill bg-danger status"> Decative </button>';
                }
            })

            ->rawColumns(['action','user_id','status'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UserDetailDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserDetail $model)
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
                    ->setTableId('userdetaildatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
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
            Column::make('id')->data('DT_RowIndex'),
            Column::make('user_id'),
            Column::make('country'),
            Column::make('state'),
            Column::make('city'),
            Column::make('education'),
            Column::make('work'),
            Column::make('employer'),
            Column::make('about_me'),
            Column::make('height'),
            Column::make('speaks'),
            Column::make('cast'),
            Column::make('smoking'),
            Column::make('drinks'),
            Column::make('food'),
            Column::make('marray_age'),
            Column::make('dressing'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
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
        return 'UserDetail_' . date('YmdHis');
    }
}
