<li>
    <div>{{ $comment->user->name }}</div>
    <div>{{ $comment->created_at->diffForHumans(now()) }}</div>

    <p>{{ $comment->trashed() ? '削除されたコメントです。' : $comment->content }}</p>

    @unless ($comment->trashed())
        @can(['update', 'delete'], $comment)
            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit">削除</button>
            </form>

            <form action="{{ route('comments.update', $comment) }}" method="POST">
                @csrf
                @method('PUT')

                <textarea name="content">{{ $comment->content }}</textarea>

                <button type="submit">修正</button>
            </form>
        @endcan
    @endunless
</li>
