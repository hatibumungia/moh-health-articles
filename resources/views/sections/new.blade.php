@extends('layouts.app')

@section('title', 'Create a new section')

@section('content')

{{-- Navbar --}}
	@include('partials.navbar')

<div class="container">
	<div class="row">

		<div class="col-md-9">
			<h2>{{ $article->title }}</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">New Section</h3>
				</div>
				<div class="panel-body">
					
                   <form action="{{ url('sections') }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

							{{ csrf_field() }}

							<input type="hidden" name="article_id" value="{{ $article->id }}">

							@include('sections._form')														

                      		<div class="form-group">
                      			<div class="col-sm-1 col-sm-offset-2">
                      				<button type="submit" name="btn_finish" class="btn btn-primary">Finish</button>
                      			</div>
                      			<div class="col-sm-2">
                      				<button type="submit" name="btn_new" class="btn btn-primary">New Section</button>
                      			</div>
                      		</div>

                      </form>   

				</div>
			</div>
		</div>

		<div class="col-md-3">
			<h2>Sections</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Existing Sections</h3>
				</div>
				<div class="panel-body">
					@if($article->sections->count() > 0)
						<ol>
							@foreach($article->sections as $section)
								<li>{{ $section->title }}</li>
							@endforeach
						</ol>
					@else
						<p>
							No section
						</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection