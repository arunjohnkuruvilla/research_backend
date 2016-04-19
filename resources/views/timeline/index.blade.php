@extends('templates.default')

@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <form role="form" action="{{ route('status.post') }}" method="post">
	            <div class="form-group">
	                <textarea placeholder="What's up {{ $user->firstname }}?" name="status" class="form-control" rows="2"></textarea>
	            </div>
	            <button type="submit" class="btn btn-default">Update status</button>
	            <input type="hidden" name="_token" value="{{ Session::token() }}">
	        </form>
	        <hr>
	    </div>
	</div>

	<div class="row">
	    <div class="col-lg-12">
	    	@if( !$statuses->count() )
	    		<p>There is nothing in your timeline, yet.</p>
	    	@else
	    		@foreach ($statuses as $status)
			        <div class="media">
					    <a class="pull-left" href="#">
					        <img class="media-object" alt="{{ $status->user->fullname() }}" src="{{ $status->user->profilephoto==null?URL::to('/').'/img/default_profile_photo.jpg':$status->user->profilephoto }}" style="height:80px; width:80px;">
					    </a>
					    <div class="media-body">
					        <h4 class="media-heading"><a href="">{{ $status->user->fullname() }}</a></h4>
					        <p>{{ $status->body }}</p>
					        <ul class="list-inline">
					            <li>{{ $status->created_at->diffForHumans() }}</li>
					            <!--<li><a href="#">Like</a></li>
					            <li>10 likes</li>-->
					        </ul>

					        <!--Uncomment this to include reply to post feature
					        <form role="form" action="#" method="post">
					            <div class="form-group">
					                <textarea name="reply-1" class="form-control" rows="2" placeholder="Reply to this status"></textarea>
					            </div>
					            <input type="submit" value="Reply" class="btn btn-default btn-sm">
					        </form>-->
					    </div>
					</div>
				@endforeach
			@endif
	    </div>
	</div>
@stop