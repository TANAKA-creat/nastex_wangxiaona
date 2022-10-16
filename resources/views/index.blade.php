<x-layout>
    <x-slot name="title">
        业务报告 - 王晓娜
    </x-slot>

    <h1>
        <span>王晓娜</span>
        <span class="current-time"><?php echo date('Y年m月d日    - H:i:s (l)'); ?></span>
        <a href="{{ route('posts.create') }}">
            [写报告]
        </a>
    </h1>
    <div class="advice">
    <p class="advice1">记录日期</p>
    <p class="advice2">点击记录日期跳转到编辑删除页面</p>
    </div>
    <ul>
        @forelse($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>
            </li>
        @empty
            <li>无记录</li>
        @endforelse
    </ul>
</x-layout>

