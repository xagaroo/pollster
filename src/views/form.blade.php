@extends('pollster::layout.pollster')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4>{{$poll->name}}</h4>
		</div>
	</div>
	<form role="form" method="POST" action="/poll/{{$poll->id}}">
		{{ csrf_field() }}

		@foreach ($poll->questions->sortBy('order') as $question)
			@include('pollster::partials.'.$question->kind)
		@endforeach

		<button type="submit" class="btn btn-primary">Submit</button>

		
	</form>
</div>
@endsection
