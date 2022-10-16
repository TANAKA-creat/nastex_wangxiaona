<x-layout>
    <x-slot name="title">
        添加记录 - 业务报告
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">返回</a>
    </div>
    <h1>记录 - 业务报告</h1>
    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div class="form-group">
            <label>
                请填写记录日期
                <input type="text" name="title" value="{{ old('title') }}">
            </label>
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>
               请填写报告内容
                <textarea name="body">{{ old('body') }}</textarea>
            </label>
            @error('body')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-button">
            <button>登记</button>
        </div>
    </form>
</x-layout>
