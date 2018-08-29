@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h4 style="display: inline-block;">Create</h4>
            	</div>

                <div class="panel-body">
                	@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

					@if (Session::has('success'))
						<div class="alert alert-success">
							{{ Session::get('success') }}
						</div>
					@endif
                	<form class="form-horizontal" action="{{ Route('postQuestion') }}" method="POST">
                		{{ csrf_field() }}
					  <div class="form-group">
					    <label for="questionaire_name" class="col-sm-3 control-label">Questionaire Name</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="questionaire_name" name="questionaire_name" placeholder="Enter Questionaire Name" value="{{ old('questionaire_name') }}">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="duration" class="col-sm-3 control-label">Duration</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" name="duration" id="duration" placeholder="Enter Duration" value="{{ old('duration') }}">
					    </div>
					    <div class="col-sm-4">
					      <select class="form-control" name="duration_type">
					      	<option value="min">Minutes</option>
					      	<option value="hr">Hours</option>
					      </select>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="questionaire_name" class="col-sm-3 control-label">Can Resume?</label>
					    <div class="radio col-md-4">
						  <label>
						    <input type="radio" name="resume" id="yes" value="1">
						    Yes
						  </label>
						</div>
						<div class="radio col-md-4">
						  <label>
						    <input type="radio" name="resume" id="no" value="0" checked>
						    No
						  </label>
						</div>
					  </div>
					  <br>
					  <div class="form-group text-center">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary">Save</button>
					    </div>
					  </div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection