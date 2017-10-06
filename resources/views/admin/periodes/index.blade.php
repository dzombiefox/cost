@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Periodes</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/periodes/create') }}" class="btn btn-primary btn-xs" title="Add New Periode"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> PeriodeName </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($periodes as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->periodeName }}</td>
                                        <td>
                                            <a href="{{ url('/admin/periodes/' . $item->id) }}" class="btn btn-success btn-xs" title="View Periode"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/periodes/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Periode"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/periodes', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Periode" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Periode',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $periodes->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection