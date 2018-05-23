<div class="form-group">
	<label for="q{{$question->id}}">{{$question->question}}</label>
	<select name="question[{{$question->id}}]" class="form-control">
		<option value="" selected>Select a value</option>
		<option {{ old('question.'.$question->id) == 1 ? "selected" : "" }} value="1">1</option>
		<option {{ old('question.'.$question->id) == 2 ? "selected" : "" }} value="2">2</option>
		<option {{ old('question.'.$question->id) == 3 ? "selected" : "" }} value="3">3</option>
		<option {{ old('question.'.$question->id) == 4 ? "selected" : "" }} value="4">4</option>
		<option {{ old('question.'.$question->id) == 5 ? "selected" : "" }} value="5">5</option>
	</select>
</div>

@if ($errors->has('question.'.$question->id))
    <span class="help-block" style='color:red;'>
        <strong>You must select a value</strong>
    </span>
@endif