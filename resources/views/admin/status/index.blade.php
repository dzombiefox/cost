@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Status</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/status/create') }}" class="btn btn-primary btn-xs" title="Add New Status"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> StatusName </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($status as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->statusName }}</td>
                                        <td>
                                            <a href="{{ url('/admin/status/' . $item->id) }}" class="btn btn-success btn-xs" title="View Status"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/status/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Status"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/status', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Status" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Status',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $status->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection