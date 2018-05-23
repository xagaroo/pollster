<div class="form-group">
	<label for="q{{$question->id}}">{{$question->question}} </label> <small>You can choose more than 1 option</small>
	<select multiple name="question[{{$question->id}}][]" class="form-control">
		@foreach ($question->answers as $answer)
		<option {{ in_array($answer->id, old('question.'.$question->id, [])) ? "selected" : "" }} value="{{$answer->id}}">{{$answer->text}}</option>
		@endforeach
	</select>
</div>