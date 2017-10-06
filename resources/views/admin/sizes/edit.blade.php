@extends('layouts.admin')
@section('content')
<section class="content-header">
      <h1>
       Edit Size    
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/sizes')}}">Sizes</a></li>
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

                        {!! Form::model($size, [
                            'method' => 'PATCH',
                            'url' => ['/admin/sizes', $size->size_id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}
<div class="box-body">
                        @include ('admin.sizes.form', ['submitButtonText' => 'Update'])
</div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
        </section>
   
@endsection