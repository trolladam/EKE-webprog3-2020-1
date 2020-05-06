<div class="post-meta d-flex">
    <a href="{{ route('profile.show', $post->author) }}">
        <img class="avatar" src="{{ $post->author->avatar }}" alt="{{ $post->author->fullname }}">
    </a>
    <div class="info ml-2">
        <p>
            <a class="user" href="{{ route('profile.show', $post->author) }}">
                {{ $post->author->fullname }}
            </a>
            <a href="#" class="follow btn btn-sm btn-outline-dark ml-2">{{ __('Follow') }}</a>
            @can('update', $post)
                <a class="edit btn btn-sm btn-outline-primary ml-2" href="{{ route('post.edit', $post) }}">{{ __('Edit') }}</a>
            @endcan
        </p>
        <p>
            {{ $post->created_at->format('Y m d') }} &#9679; {{ $post->minutes_to_read }}
        </p>
        <p class="custom-p">
            sample text
        </p>
    </div>
    <div class="ml-auto">
        <p class="topic text-right">
            <a href="{{ route('topic.show', $post->topic) }}">
                {{ $post->topic->title }}
            </a>
        </p>
    </div>
</div>
