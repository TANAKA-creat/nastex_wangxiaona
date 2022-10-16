<x-layout>
    <x-slot name="title">
        {{ $post->title }} - 业务报告
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">返回</a>
    </div>

    <h1>
        <span>{{ $post->title }}</span>
        <a href="{{ route('posts.edit', $post) }}">
            [编辑]
        </a>

        <form method="post" action="{{ route('posts.destroy', $post) }}" id="delete_post">
            @method('DELETE')
            @csrf
            <button class="btn">[删除]</button>
        </form>
    </h1>

    <p>{!! nl2br(e($post->body)) !!}</p>
    <h2>确认者恢复</h2>
    <ul>
        <li>
            <form method="post" action="{{ route('comments.store', $post) }}" class="comment-form">
                @csrf
                <input type="text" name="body">
                <button>登记</button>
            </form>
        </li>
        @foreach ($post->comments()->latest()->get() as $comment)
            <li class="comment-font">
                {{ $comment->body }}
                <form method="post" action="{{ route('comments.destroy', $comment) }}" class="delete-comment">
                    @method('DELETE')
                    @csrf
                    <button class="btn">[删除]</button>
                </form>
            </li>
        @endforeach
    </ul>

    <h2>记录者恢复</h2>
    <ul>
        <li>
            <form method="post" action="{{ route('return_comments.store', $post) }}" class="comment-form">
                @csrf
                <input type="text" name="body">
                <button>登记</button>
            </form>
        </li>
        @foreach ($post->return_comments()->latest()->get() as $return_comment)
            <li class="comment-font">
                {{ $return_comment->body }}
                <form method="post" action="{{ route('return_comments.destroy', $return_comment) }}" class="delete-comment">
                    @method('DELETE')
                    @csrf
                    <button class="btn">[删除]</button>
                </form>
            </li>
        @endforeach
    </ul>

    <script>
        'use strict'; {
            document.getElementById('delete_post').addEventListener('submit', e => {
                e.preventDefault();

                if (!confirm('您真的要删除这个吗？！')) {
                    return;
                }

                e.target.submit();
            });

            document.querySelectorAll('.delete-comment').forEach(form => {
                form.addEventListener('submit', e => {
                    e.preventDefault();

                    if (!confirm('您真的要删除这个吗？！')) {
                        return;
                    }
                    form.submit();
                });
            });

            document.querySelectorAll('.delete-return_comment').forEach(form => {
                form.addEventListener('submit', e => {
                    e.preventDefault();

                    if (!confirm('您真的要删除这个吗？！')) {
                        return;
                    }
                    form.submit();
                });
            });
        }
    </script>
</x-layout>
