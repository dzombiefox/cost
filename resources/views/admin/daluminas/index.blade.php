@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Daluminas</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/daluminas/create') }}" class="btn btn-primary btn-xs" title="Add New Dalumina"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> AluminaId </th><th> ItemId </th><th> Dvolume </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($daluminas as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->aluminaId }}</td><td>{{ $item->itemId }}</td><td>{{ $item->dvolume }}</td>
                                        <td>
                                            <a href="{{ url('/admin/daluminas/' . $item->id) }}" class="btn btn-success btn-xs" title="View Dalumina"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/daluminas/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Dalumina"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/daluminas', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Dalumina" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Dalumina',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $daluminas->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection