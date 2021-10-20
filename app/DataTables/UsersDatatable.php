<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDatatable extends DataTable
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
            // ->addColumn('action', 'usersdatatable.action');
            ->addColumn('action', function($data){
                $result = '<div class="btn-group">';
                $result .= '<a href="'.route('admin.dashboard.show',$data->id).'"><button class="btn-sm btn-outline-warning">Show</button></a>';
                $result .= '<a href="'.route('admin.dashboard.edit',$data->id).'"><button class="btn-sm btn-outline-info">Edit</button></a>';
                $result .= '<button type="submit" data-id="'.$data->id.'" class="btn-sm btn-outline-danger delete">Delete</button></form></div>';
                return $result;
            })

            ->editColumn('image', function($data){
            if($data->image) {
                return '<img src="'.asset('storage/admin/'.$data->image).'" width="50px">';
            } else {
                return '<img src="'.asset('storage/admin/'.$data->image).'" width="50px">';
            }
            })

            ->editColumn('status', function ($data) {
            if($data['status'] == '1')
            {
                return '<button type="button" data-id="'.$data->id.'" class="badge rounded-pill bg-success status">Active </button>';
            }else{
                return '<button type="button" data-id="'.$data->id.'" class="badge rounded-pill bg-danger status">Decative </button>';
            }
            })

            ->rawColumns(['action','image','status'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UsersDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
                    ->setTableId('usersdatatable-table')
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
            Column::make('id'),
            Column::make('name'),
            Column::make('mobile'),
            Column::make('email'),
            Column::make('image'),
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
        return 'Users_' . date('YmdHis');
    }
}
