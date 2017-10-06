@extends('layouts.admin')
@section('content')
<section class="content-header">
      <h1>
       Create Item      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/items')}}">Items</a></li>
        <li class="active">Create</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/items', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.items.form')

                        {!! Form::close() !!}


    </div>
</div>
</div>
</section>
   
@endsection