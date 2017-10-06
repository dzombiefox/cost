@extends('layouts.admin')

@section('content')
 <section class="content-header">
      <h1>
       Edit Brands      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/brands')}}">Brands</a></li>
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

                        {!! Form::model($brand, [
                            'method' => 'PATCH',
                            'url' => ['/admin/brands', $brand->brand_id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}
                        

                        @include ('admin.brands.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </section>
    
@endsection