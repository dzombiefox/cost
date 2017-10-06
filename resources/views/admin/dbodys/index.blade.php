@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dbodys</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/dbodys/create') }}" class="btn btn-primary btn-xs" title="Add New Dbody"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> BodyId </th><th> ItemId </th><th> Volume </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($dbodys as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->bodyId }}</td><td>{{ $item->itemId }}</td><td>{{ $item->volume }}</td>
                                        <td>
                                            <a href="{{ url('/admin/dbodys/' . $item->id) }}" class="btn btn-success btn-xs" title="View Dbody"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/dbodys/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Dbody"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/dbodys', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Dbody" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Dbody',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $dbodys->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection