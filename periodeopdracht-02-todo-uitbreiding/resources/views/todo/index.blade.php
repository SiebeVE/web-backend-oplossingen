@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				@if (Session::has('success'))
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<p>{{ Session::get('success') }}</p>
					</div>
				@endif
				<div class="panel panel-default">
					<div class="panel-heading">Huidige to-do's</div>
					<div class="panel-body">
						@if(count($todos) > 0 || count($todosDone) > 0)
							<a href="{{ url('/todo/add') }}">Nieuwe to-do aanmaken</a>
							<table class="table table-striped task-table">
								<thead>
								<th colspan="2">To do</th>
								</thead>
								<tbody>
								@if(count($todos))
									@foreach($todos as $todo)
										<tr>
											<td class="table-text">
													<a class="todoLink" href="{{ url('/todo/toggle/'.$todo->id) }}" title="Vink maar af"><i class="fa fa-check-circle"></i> {{ $todo->name }}</a>
											</td>
											<td class="text-right">
												<form action="{{ url('/todo/'.$todo->id) }}" method="post">
													{!! csrf_field() !!}
													{!! method_field('DELETE') !!}
													<button class="btn btn-danger" title="Verwijder dit maar">
														<i class="fa fa-trash"></i>	Verwijder to-do
													</button>
												</form>
											</td>
										</tr>
									@endforeach
								@else
									<tr>
										<td>Hoera, alles is klaar!</td>
									</tr>
								@endif
								</tbody>
							</table>

							<table class="table table-striped task-table">
								<thead>
								<th colspan="2">Done</th>
								</thead>
								<tbody>
								@if(count($todosDone))
									@foreach($todosDone as $todo)
										<tr>
											<td class="table-text done">
												<a class="todoLink" href="{{ url('/todo/toggle/'.$todo->id) }}" title="Oeps, dit moet nog gedaan worden"><i class="fa fa-check-circle"></i> {{ $todo->name }}</a>
											</td>
											<td class="text-right">
												<form action="{{ url('/todo/'.$todo->id) }}" method="post">
													{!! csrf_field() !!}
													{!! method_field('DELETE') !!}
													<button class="btn btn-danger" title="Verwijder dit maar">
														<i class="fa fa-trash"></i>	Verwijder to-do
													</button>
												</form>
											</td>
										</tr>
									@endforeach
								@else
									<tr>
										<td>Werk aan de winkel!</td>
									</tr>
								@endif
								</tbody>
							</table>
						@else
							<div class="alert alert-info">
								Mmh, nog geen to-do's tijd om er enkele aan te maken! <a href="{{ url('/todo/add') }}" class="alert-link">Klik hier om een nieuwe to-do aan te maken.</a>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection