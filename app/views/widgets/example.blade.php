
<div class="panel panel-default">
	<div class="panel-heading">Example Widget</div>

	<div class="list-group">


		@forelse($posts as $post)

			@presenter(p, Weloquent\Presenters\PostPresenter, $post, false)

			<a href="{{ $p->permalink }}" class="list-group-item">

				<div class="media">

					@if($thumb = $p->thumb)
						<div class="media-left"><img src="{{ $thumb }}" alt=" " style="width: 50px"/></div>
					@endif

					<div class="media-body">
						<h4 class="media-heading">{{ $p->title }}</h4>
					</div>

				</div>

			</a>


		@empty

			<div class="list-group-item">No posts found</div>

		@endforelse

	</div>
</div>
