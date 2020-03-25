<article class="card">
    <div class="card-header">
        {{ $post->title }}
    </div>
    <div class="card-body">
        <p>{{ $post->description }}</p>
        <p>{{ $post->topic->title }}</p>
        <p>{{ $post->author->firstname }}</p>
    </div>
</article>
