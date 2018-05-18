{{$question->question}}

<div class="custom-control custom-radio">
  <input type="radio" id="customRadio1" name="question[{{$question->id}}]" class="custom-control-input" value="yes">
  <label class="custom-control-label" for="customRadio1">Yes</label>
</div>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio2" name="question[{{$question->id}}]" class="custom-control-input" value="no">
  <label class="custom-control-label" for="customRadio2">No</label>
</div>

<hr>