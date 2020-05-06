<div class="comment" id="comment-{{$comment->id}}">
    <div class="card mb-3">
        <div class="card-body">
            <div class="comment-meta d-flex">
                <a href="{{ route('profile.show', $comment->user) }}">
                    <img class="avatar" src="{{ $comment->user->avatar }}" alt="{{ $comment->user->fullname }}">
                </a>
                <div class="info ml-2">
                    <p>
                        <a href="{{ route('profile.show', $comment->user) }}" class="user">
                            {{ $comment->user->fullname }}
                        </a>
                    </p>
                    <p>
                        {{ $comment->created_at->diffForhumans() }}
                    </p>
                </div>
                @if (!$comment->is_reply)
                <div class="ml-auto">
                    <a href="#" class="reply-btn">
                        <span class="text-reply">{{ __('Reply') }}</span>
                        <span class="text-cancel">{{ __('Cancel') }}</span>
                    </a>
                </div>
                @endif
            </div>
            <p>
                {{ $comment->body }}
            </p>
        </div>
    </div>
    <div class="replies pl-5">
        @auth
            @if (!$comment->is_reply)
                <form action="{{ route('comment.reply', $comment) }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ URL::current() }}#comment-{{$comment->id}}" name="redirect_url">
                    <div class="form-group">
                        <textarea class="form-control" name="comment" placeholder="{{ __('Comment text...') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Reply</button>
                    </div>
                </form>
            @endif
        @endauth
        @foreach ($comment->replies as $reply)
            @include('comments._item', ['comment' => $reply])
        @endforeach
    </div>
</div>
