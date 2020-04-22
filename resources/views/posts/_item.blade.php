<article class="card mb-5">
    <div class="card-header">
        <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
        @can('update', $post)
            <a href="{{ route('post.edit', $post) }}">{{ __('edit') }}</a>
        @endcan
        | Author:
        <a href="{{ route('profile.show', $post->author) }}">
            {{ $post->author->fullname }}
        </a>
    </div>
    <div class="card-body">
        <p>{{ $post->description }}</p>
        <p>{{ $post->topic->title }}</p>
        <p>{{ $post->author->firstname }}</p>
    </div>
</article>
