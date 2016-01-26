@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">To-do toevoegen</div>
					<div class="panel-body">
						<a href="{{ url('/todo') }}">Terug naar mijn to-do's</a>
						@include('errors.common')
						<form action="{{ url('/todo/add') }}" method="POST" class="form-horizontal">
							{!! csrf_field() !!}
						<div class="form-group">
								<label for="task-name" class="col-sm-3 control-label">To-do</label>
								<div class="col-sm-6">
									<input type="text" name="name" id="task-name" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-6">
									<button type="submit" class="btn btn-default">
										<i class="fa fa-plus"></i> To-do toevoegen
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection