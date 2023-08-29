@extends('admin.layouts.layout')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-4">
            @include('admin.product.product_menu')
        </div>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>Upload Images</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                     {!! Form::open(['url' => ['admin/product/images', $product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                     @csrf
                    <div class="form-group">
                        {!! Form::label('image', 'Product Image') !!}
                        {!! Form::file('image', ['class' => 'form-control-file', 'placeholder' => 'product image']) !!}
                    </div>
                    <div class="form-footer pt-5 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Save</button>
                        <a href="{{ url('admin/product/'.$productID.'/images') }}" class="btn btn-secondary btn-default">Back</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection