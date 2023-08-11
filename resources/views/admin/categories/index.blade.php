@extends('admin.layouts.layout')


@section('content')
<div class="content">
    <div class="row">
    <div class="col-12">
    <div class="card card-default">
			<div class="card-header card-header-border-bottom d-flex justify-content-between">
				<h2>Listing Categories</h2>

				<a href="{{route('categories.create')}}" class="btn btn-outline-primary btn-sm text-uppercase">
					<i class=" mdi mdi-plus mr-1"></i> Create
				</a>
			</div>

			<div class="card-body">
			@include('admin.partials.flash', ['$errors' => $errors])
				<div class="basic-data-table">
				<table id="basic-data-table" class="table table-hover nowrap" style="width:100%">
						<thead>
							<tr>
								<th>id</th>
								<th>Name</th>
								<th>Slug</th>
								<th>parent</th>
								<th>Action</th>
								
							</tr>
						</thead>

						<tbody>
							
							@foreach($categories as $category)
							<tr>
								<td>{{$category->id}}</td>
								<td>{{$category->name}}</td>
								<td>{{$category->slug}}</td>
								<td>{{$category->parent ? $category->parent->name : ''}}</td>
								<td>
                                            <a href="{{ url('admin/categories/'. $category->id .'/edit') }}" class="btn btn-outline-warning btn-sm text-uppercase">edit</a>
                                            
                                            {!! Form::open(['url' => 'admin/categories/'. $category->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('remove', ['class' => 'btn btn-outline-danger btn-sm ']) !!}
                                            {!! Form::close() !!}
                                        </td>
								
							</tr>

							@endforeach
						</tbody>
					</table>

					@include('sweetalert::alert')
					<script class="text/javascript">

					jQuery(document).ready(function() {
					jQuery('#basic-data-table').DataTable({
					"dom": '&lt;"row justify-content-between top-information"lf&gt;rt&lt;"row justify-content-between bottom-information"ip>&lt;"clear"&gt;'
					});
					});
					</script>
				
				</div>
			</div>
		</div>
    </div>
@endsection