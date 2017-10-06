@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dengobe {{ $dengobe->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/dengobes/' . $dengobe->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Dengobe"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/dengobes', $dengobe->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Dengobe',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $dengobe->id }}</td>
                                    </tr>
                                    <tr><th> EngobeId </th><td> {{ $dengobe->engobeId }} </td></tr><tr><th> ItemId </th><td> {{ $dengobe->itemId }} </td></tr><tr><th> Dvolume </th><td> {{ $dengobe->dvolume }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection