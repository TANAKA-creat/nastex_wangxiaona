<x-layout>
    <x-slot name="title">
       编辑 - 业务报告
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.show',$post) }}">返回</a>
    </div>
    <h1>编辑 - 业务报告</h1>
    <form method="post" action="{{ route('posts.update', $post) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label>
                编辑记录日期
                <input type="text" name="title" value="{{ old('title', $post->title) }}">
            </label>
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>
               编辑记录内容
                <textarea name="body">{{ old('body', $post->body) }}</textarea>
            </label>
            @error('body')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-button">
            <button>编辑</button>
        </div>
    </form>
</x-layout>
