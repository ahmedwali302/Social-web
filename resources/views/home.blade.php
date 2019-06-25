 @extends('layouts.app') @section('content') {{-- home page and timeline --}}
<div class="panel-body">

	<div style="margin-top:-30px" class="panel panel-default">
		<div class="panel-heading"> Add a new post</div>

		<div class="panel-body">
			<form class="form-horizontal" method="POST" method="post" enctype="multipart/form-data" action="{{route('posts.post')}}">
				{{ csrf_field() }} {{-- adding posts --}}

				<div class="form-group{{ $errors->has('caption') ? ' has-error' : '' }}">

					<div class="col-md-15">
						<textarea id="caption" type="text" placeholder="Add your status" class="form-control" name="caption" value="" autofocus></textarea>

					</div>
				</div>


				<div class="form-group">
					<label for="image" class="col-md-4 control-label">Image</label>

					<div class="col-md-6">
						<input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}">
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Add
						</button>
					</div>


				</div>

			</form>

		</div>

	</div>
	{{-- retriving posts --}} 
    @if(count($posts)>0)
     @foreach($posts as $item)
	<ul class="list-group">

		<li class="list-group-item">
			<div style="display:flex;border-bottom:1px solid gray">
				<img height="100px" style="margin-bottom:20px" src="storage/images/{{$item->user->image}}" />
				<h4 style="margin-left:30px;" >{{$item->user->username}}</h4>
			</div>
			<div class="thumbnail left">
					@if ($item->image)
					<img style="max-height:300px"  src = "storage/images/{{$item->image}}" >
			   @else
			   <img style="max-height:300px"  src = "storage/images/nocap.jpg" >
							 
					 @endif
			</div>

			<div class="caption">
				<h3 style="text-align:center" > {{$item->caption}} </h3>
                <p style="float:right"> {{$item->created_at}} </p>
				<p>
					<a href="/posts/{{$item->id}}/like" class="btn btn-primary" role="button">
						LIKE <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>

					</a>
					{{--  <b>{{$item->likes->count()}}</b>  --}}
				</p>

			</div>
		</li>

	</ul>

	@endforeach 
	@endif

</div>
</div>
</div>

</div>

</div>
@endsection