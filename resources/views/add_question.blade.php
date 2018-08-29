@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h4 style="display: inline-block;">Add Questions</h4>
            	</div>

                <div class="panel-body">
                	<form class="form-horizontal">
                		{{ csrf_field() }}
                		<div class="appendQuestion"></div>
                		<p class="text-primary addQuestion" style="cursor: pointer;">Add Question</p>
                	</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script type="text/javascript">
	$(function(){
		var no_of_questions = 0;
		$(document).on('click', '.addQuestion', function() {
			no_of_questions += 1;
			let question_choice = `<div class="form-group">
								    <label class="col-sm-3 control-label">Question Type</label>
								    <div class="col-sm-9">
								      <select no_of_questions="`+no_of_questions+`" class="form-control choice choice`+no_of_questions+`" id="question_type" name="question_type">
								      	<option value="text">Text</option>
								      	<option value="s-mcq">Multiple Choice (Single Option)</option>
								      	<option value="m-mcq">Multiple Choice (Multiple Option)</option>
								      </select>
								    </div>
								</div>

								<div class="form-group">
								    <label class="col-sm-3 control-label">Question</label>
								    <div class="col-sm-9">
								      <input type="text" class="form-control" name="question" placeholder="Enter Question" value="{{ old('question') }}">
								    </div>
							  	</div>

							  	<div class="answerChoice`+no_of_questions+`">
							  		<div class="form-group">
									    <label class="col-sm-3 control-label">Answer</label>
									    <div class="col-sm-9">
									      <input type="text" class="form-control" name="answer" placeholder="Enter Answer">
									    </div>
								  	</div>
							  	</div>`;
			$('.appendQuestion').append(question_choice);
			$('.appendQuestion').after().append('<hr>');
		});

		$(document).on('change', '.choice', function() {
			let no_of_questions = $(this).attr('no_of_questions');
			let val = $(this).val();
			var choice;
			switch(val) {
				case 'text':
					$('.answerChoice'+no_of_questions).html(`
															<div class="form-group">
															    <label class="col-sm-3 control-label">Answer</label>
															    <div class="col-sm-9">
															      <input type="text" class="form-control" name="answer" placeholder="Enter Answer">
															    </div>
														  	</div>`);
					break;

				case 's-mcq':
				choice = 1;
					$('.answerChoice'+no_of_questions).html(`
															<input type="hidden" name="no_of_choices`+no_of_questions+`" value="`+choice+`"/>
															<div class="form-group">
															    <label class="col-sm-3 control-label">Choice `+choice+`</label>
															    <div class="col-sm-9">
															      <input type="text" class="form-control" name="answer" placeholder="Enter Choice">
															    </div>
														  	</div>
															`);
					$('.answerChoice'+no_of_questions).append(`
																<p class="addChoice pull-right text-primary" style="cursor:pointer;" no_of_questions="`+no_of_questions+`">Add Choice</p> <br/>
																`);
					break;

				case 'm-mcq':
					choice = 1;
					$('.answerChoice'+no_of_questions).html(`
															<input type="hidden" name="no_of_choices`+no_of_questions+`" value="`+choice+`"/>
															<div class="form-group">
															    <label class="col-sm-3 control-label">Choice `+choice+`</label>
															    <div class="col-sm-9">
															      <input type="text" class="form-control" name="answer" placeholder="Enter Choice">
															    </div>
														  	</div>
															`);
					$('.answerChoice'+no_of_questions).append(`
																<p class="addChoice pull-right text-primary" no_of_questions="`+no_of_questions+`">Add Choice</p> <br/>
																`);
					break;

				case 'default':
					break;
			}
		});

		$(document).on('click', '.addChoice', function() {
			let choice = $(this).attr('no_of_questions');
			// let choice_no =
		});
	});
</script>
@endsection