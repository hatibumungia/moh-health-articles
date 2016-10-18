@extends('layouts.app')

@section('title', 'Create a new article')

@section('content')

{{-- Navbar --}}
	@include('partials.navbar')

<div class="container">
	<div class="row">

		<div class="col-md-10 col-md-offset-1">
			<h2>Write a new article</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Article</h3>
				</div>
				<div class="panel-body">
					
                   <form action="{{ url('articles') }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

							{{ csrf_field() }}

							<div class="form-group">
								<label for="title" class="col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
									<input type="text" name="title" id="title" class="form-control" placeholder="Title">
								</div>
							</div>

							<div class="form-group">
								<label for="category" class="col-sm-2 control-label">Category</label>
								<div class="col-sm-5">
									<select name="category" id="category" class="form-control">
										<option value="1">Uncategorised</option>
										@foreach($categories as $category)
											<option value="{{ $category->id }}">{{ $category->name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Image</label>
								<div class="col-sm-10">
									<input type="file" name="image">
								</div>
							</div>														

                      		<div class="form-group">
                      			<div class="col-sm-10 col-sm-offset-2">
                      				<button type="submit" class="btn btn-primary">Submit</button>
                      			</div>
                      		</div>

                      </form>   

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
