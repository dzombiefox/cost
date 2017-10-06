@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Finks</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/finks/create') }}" class="btn btn-primary btn-xs" title="Add New Fink"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> FinishId </th><th> InkId </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($finks as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->finishId }}</td><td>{{ $item->inkId }}</td>
                                        <td>
                                            <a href="{{ url('/admin/finks/' . $item->id) }}" class="btn btn-success btn-xs" title="View Fink"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/finks/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Fink"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/finks', $item->fink_id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Fink" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Fink',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $finks->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection