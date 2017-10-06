@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dglaze {{ $dglaze->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/dglazes/' . $dglaze->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Dglaze"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/dglazes', $dglaze->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Dglaze',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $dglaze->id }}</td>
                                    </tr>
                                    <tr><th> GlazeId </th><td> {{ $dglaze->glazeId }} </td></tr><tr><th> ItemId </th><td> {{ $dglaze->itemId }} </td></tr><tr><th> Dvolume </th><td> {{ $dglaze->dvolume }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection