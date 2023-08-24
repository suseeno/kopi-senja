@extends('admin.layouts.layout')


@section('content')
<div class="content">
    <div class="row">
    <div class="col-12">
    <div class="card card-default">
			<div class="card-header card-header-border-bottom d-flex justify-content-between">
				<h2>Listing Product</h2>

				<a href="{{route('product.create')}}" class="btn btn-outline-primary btn-sm text-uppercase">
					<i class=" mdi mdi-link mr-1"></i> Create
				</a>
			</div>

			<div class="card-body">
			@include('admin.partials.flash', ['$errors' => $errors])
				<div class="basic-data-table">
                <table id="basic-data-table" class="table nowrap" style="width:100%">
						<thead>
							<tr>
								<th>id</th>
								<th>Sku</th>
								
								<th>Name</th>
                                <th>price</th>
                                <th>status</th>
								<th>Action</th>
								
							</tr>
						</thead>

						<tbody>
							@foreach($product as $prod)
							<tr>
                                <td>{{$prod->id}}</td>
                                <td>{{$prod->sku}}</td>
                                <td>{{$prod->name}}</td>
                                <td>{{$prod->price}}</td>
                                <td>{{$prod->status}}</td>
							
								<td>
                                            <a href="{{ url('admin/product/'. $prod->id .'/edit') }}" class="btn btn-outline-warning btn-sm text-uppercase">edit</a>
                                            
                                            {!! Form::open(['url' => 'admin/product/'. $prod->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('remove', ['class' => 'btn btn-outline-danger btn-sm ']) !!}
                                            {!! Form::close() !!}
                                        </td>
								
                            </tr>
							@endforeach
						</tbody>
					</table>

					
					@include('sweetalert::alert')
					<script src="https://unpkg.com/feather-icons"></script>
					<script>
								
				feather.replace()
				</script>
					
				</div>
			</div>
		</div>
    </div>
@endsection