{{$question->question}}

<select name="question[{{$question->id}}]" class="custom-select">
	<option selected>Select a value</option>
	@foreach ($question->answers as $answer)
	<option value="{{$answer->id}}">{{$answer->text}}</option>
	@endforeach
</select>

<hr>