@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dengobes</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/dengobes/create') }}" class="btn btn-primary btn-xs" title="Add New Dengobe"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> EngobeId </th><th> ItemId </th><th> Dvolume </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($dengobes as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->engobeId }}</td><td>{{ $item->itemId }}</td><td>{{ $item->dvolume }}</td>
                                        <td>
                                            <a href="{{ url('/admin/dengobes/' . $item->id) }}" class="btn btn-success btn-xs" title="View Dengobe"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/dengobes/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Dengobe"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/dengobes', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Dengobe" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Dengobe',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $dengobes->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection