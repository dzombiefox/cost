@extends('layouts.admin')

@section('content')
<section class="content-header">
      <h1>
       Data Brands      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/motifs')}}">Motifs</a></li>
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

                        {!! Form::open(['url' => '/admin/colors', 'class' => 'form-horizontal', 'files' => true]) !!}
<div class="box-body"> 
                        @include ('admin.colors.form')
</div>
                        {!! Form::close() !!}

            
        </div>
    </div>

</div>
</div>
</section>
   
@endsection