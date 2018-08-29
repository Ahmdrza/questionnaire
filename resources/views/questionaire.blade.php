@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                <div class="panel-heading">
                	<h4 style="display: inline-block;">Questionairs</h4>
                	<a href="{{ Route('getQuestionsCreate') }}" class="btn btn-primary btn-sm pull-right" type="button"> Create </a>
            	</div>

                <div class="panel-body">
                    @if ($questions->count() > 0)
                	<table class="table table-striped">
                		<thead>
                			<th>ID</th>
                			<th>Name</th>
                			<th>No of Qustions</th>
                			<th>Duration</th>
                			<th>Resumable</th>
                			<th>Published</th>
                			<th>Action</th>
                		</thead>
                		<tbody>
                			@foreach ($questions as $question)
                			<tr>
                				<td> {{ $question->id }} </td>
                				<td> {{ $question->question_name }} </td>
                				<td> 00 | <a href="{{ Route('addQuestionsView', ['id' => $question->id]) }}">Add</a> </td>
                				<td> {{ $question->duration }} {{ $question->duration_type }} </td>
                				<td> @if ($question->resumable == '0' ) No @else Yes @endif </td>
                				<td> -- </td>
                				<td> Edit | <a href="{{ Route('deleteQuestion', ['id' => $question->id ]) }}">Delete</a> </td>
                			</tr>
                			@endforeach
                		</tbody>
                	</table>
                    @else
                        No Questionnairs Available!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection