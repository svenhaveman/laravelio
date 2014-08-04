<div class="contributor member">
	<h2>{{ $contributor->name }}</h2>
	<p class="github-link">
		<a href="{{ $contributor->github_url }}">Github profile</a>
	</p>	
	<p class="avatar">
		<img src="{{ $contributor->user->image_url }}" alt="{{ $contributor->name }}">
	</p>
	<p class="count">Count: {{ $contributor->contribution_count }}</p>
</div>