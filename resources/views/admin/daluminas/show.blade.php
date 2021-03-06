@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dalumina {{ $dalumina->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/daluminas/' . $dalumina->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Dalumina"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/daluminas', $dalumina->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Dalumina',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $dalumina->id }}</td>
                                    </tr>
                                    <tr><th> AluminaId </th><td> {{ $dalumina->aluminaId }} </td></tr><tr><th> ItemId </th><td> {{ $dalumina->itemId }} </td></tr><tr><th> Dvolume </th><td> {{ $dalumina->dvolume }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection