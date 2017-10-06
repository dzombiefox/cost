@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Frollers</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/frollers/create') }}" class="btn btn-primary btn-xs" title="Add New Froller"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> FinishId </th><th> RollerId </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($frollers as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->finishId }}</td><td>{{ $item->rollerId }}</td>
                                        <td>
                                            <a href="{{ url('/admin/frollers/' . $item->id) }}" class="btn btn-success btn-xs" title="View Froller"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/frollers/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Froller"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/frollers', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Froller" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Froller',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $frollers->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection