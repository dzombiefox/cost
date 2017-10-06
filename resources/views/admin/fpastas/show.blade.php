@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Fpasta {{ $fpasta->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/fpastas/' . $fpasta->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Fpasta"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/fpastas', $fpasta->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Fpasta',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $fpasta->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> FinishId </th>
                                        <td> {{ $fpasta->finishId }} </td>
                                    </tr>
                                    <tr>
                                        <th> PastaId </th>
                                        <td> {{ $fpasta->pastaId }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection