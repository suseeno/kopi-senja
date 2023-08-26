@extends('admin.layouts.layout')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-4">
            @include('admin.product.product_menu')
        </div>
        <div class="col-lg-8">
            <div class="card card-default">
            		<div class="card-header card-header-border-bottom d-flex justify-content-between">
				<h2>Listing Product Images</h2>

				<a href="{{ url('admin/products/'.$productID.'/add-image')}}" class="btn btn-outline-primary btn-sm text-uppercase">
					<i class=" mdi mdi-link mr-1"></i> Create
				</a>
			</div>
                <div class="card-body">
			@include('admin.partials.flash', ['$errors' => $errors])
                    <table id="basic-data-table" class="table table-bordered table-stripped">
                        <thead>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Uploaded At</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($productImages as $image)
                            
                                <tr>    
                                    <td>{{ $image->id }}</td>
                                    <td><img src="{{asset('storage/'.$image->path) }}" style="width:150px"/></td>
                                    <td>{{ $image->created_at }}</td>
                                    <td>
                                        {!! Form::open(['url' => 'admin/product/images/'. $image->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('remove', ['class' => 'btn btn-outline-danger btn-sm ','onclick'=>'return confirm("Are You Sure  Want To Remove?")']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              
            </div>  
        </div>
    </div>
</div>
@endsection