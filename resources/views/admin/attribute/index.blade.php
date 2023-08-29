@extends('admin.layouts.layout')


@section('content')


<div class="content">
    <div class="row">
    <div class="col-12">
    <div class="card card-default">
			<div class="card-header card-header-border-bottom d-flex justify-content-between">
				<h2>Listing Attributes</h2>

				<a href="{{route('attributes.create')}}" class="btn btn-outline-primary btn-sm text-uppercase">
					<i class=" mdi mdi-plus mr-1"></i> Create
				</a>
			</div>

			<div class="card-body">
			@include('admin.partials.flash', ['$errors' => $errors])
				<div class="basic-data-table">
                <table id="basic-data-table" class="table nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Code</th>
                                    <th>name</th>
                                    <th>Type</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attributes as $attr)
                                <tr>
                                    <td>{{$attr->id}}</td>
                                    <td>{{$attr->code}}</td>
                                    <td>{{$attr->name}}</td>
                                    <td>{{$attr->type}}</td>
                                    <td>
                                            <a href="{{ url('admin/attributes/'. $attr->id .'/edit') }}" class="btn btn-outline-warning  text-uppercase">edit</a>
                                        <a href="{{url('admin/attributes/'. $attr->id .'/option')}}" class="btn btn-outline-success">Options</a>

                                            {!! Form::open(['url' => 'admin/attributes/'. $attr->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger','icon'=> 'mdi mdi delete','onclick'=>'return confirm("Are You Sure  Want To Remove?")']) !!}
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
 </div>


@endsection