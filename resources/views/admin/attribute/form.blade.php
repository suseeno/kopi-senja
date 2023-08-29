@extends('admin.layouts.layout')

@section('content')
    
@php
    $formTitle = !empty($attributes) ? 'Update' : 'New'    
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-10">
        <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} Attributes</h2>
                </div>
                <div class="card-body">
                @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($attributes))
                        {!! Form::model($attributes, ['url' => ['admin/attributes', $attributes->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/attributes']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Attributes name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('code', 'Code') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Code']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('type', 'Type') !!}
                            {!! Form::textarea('name', null, ['class' => 'form-control', 'id'=>'editor1','placeholder' => 'Code']) !!}
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('admin/attributes') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection