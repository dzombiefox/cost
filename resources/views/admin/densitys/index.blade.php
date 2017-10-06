@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Densitys</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/densitys/create') }}" class="btn btn-primary btn-xs" title="Add New Density"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> DensityName </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($densitys as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->densityName }}</td>
                                        <td>
                                            <a href="{{ url('/admin/densitys/' . $item->id) }}" class="btn btn-success btn-xs" title="View Density"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/densitys/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Density"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/densitys', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Density" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Density',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $densitys->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection