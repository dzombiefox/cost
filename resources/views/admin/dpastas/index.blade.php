@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dpastas</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/dpastas/create') }}" class="btn btn-primary btn-xs" title="Add New Dpasta"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> PastaId </th><th> ItemId </th><th> Dvolume </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($dpastas as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->pastaId }}</td><td>{{ $item->itemId }}</td><td>{{ $item->dvolume }}</td>
                                        <td>
                                            <a href="{{ url('/admin/dpastas/' . $item->id) }}" class="btn btn-success btn-xs" title="View Dpasta"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/dpastas/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Dpasta"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/dpastas', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Dpasta" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Dpasta',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $dpastas->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection