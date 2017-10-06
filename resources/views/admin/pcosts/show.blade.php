@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pcost {{ $pcost->pcost_id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/pcosts/' . $pcost->pcost_id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Pcost"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/pcosts', $pcost->pcost_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Pcost',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $pcost->pcost_id }}</td>
                                    </tr>
                                    <tr><th> SizeId </th><td> {{ $pcost->sizeId }} </td></tr><tr><th> Capacity </th><td> {{ $pcost->capacity }} </td></tr><tr><th> F EmployeeBenefit </th><td> {{ $pcost->f_employeeBenefit }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection