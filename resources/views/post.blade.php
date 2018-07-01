@extends('Centaur::layout')

@section('title') 
Algebra Blog | {{ $post->title }}
@endsection

@section('content')
	<div class="page-header">
        <h1>{{ $post->title }}</h1>
		<small>Author: {{ $post->user->email }}</small><br>
		<small>Published: {{ \Carbon\Carbon::createFromTimestamp(strtotime($post->created_at))->diffForHumans() }}</small>
    </div>
	<div class="row">
		<div class="col-sm-12">
			{!! $post->content !!}
		</div>
	</div><br><br>
	
	
	
	
		
	<div class="container">
	@if(Sentinel::check())
    <form action="{{ route('comments.store') }}" method="post">
		<div class="form-group">
			<textarea class="form-control" style="resize:none;" id="content" name="content" rows="5"></textarea>
        {!! ($errors->has('content')) ? $errors->first('content', '<p class="text-danger">:message</p>') : '' !!}
		</div>
		<div class="form-group">
        {{ csrf_field() }}
			<button type="submit" name="post_id" value="{{$post->id}}" class="btn btn-primary">Submit comment</button>
		</div>
	</form>
	@else
		<h2 style="text-align:center">You must login to be able to comment.</h2>
		<p><a class="btn btn-primary btn-lg btn-block" href="{{ route('auth.login.form') }}" role="button">Log In</a></p>
	@endif
	</div>
	
	


	@if($comments->count()>0)
    <div class="container">
		<h2>Comments:</h2><br>

		<div class="media">
			<div class="pre-scrollable">
			@foreach($comments as $comment)
				<p>{{$comment->content}}</p>
				
				<p style="text-align:right">
				<small>Comment author: {{ $comment->user->email }}</small><br>
				<small>Published: {{ \Carbon\Carbon::createFromTimestamp(strtotime($comment->created_at))->diffForHumans() }}</small>
				</p><br><br>
			@endforeach
			</div>
		</div>
	@else
		<br>
		<h2>No comments submitted yet.</h2>
	@endif
	</div>
@endsection