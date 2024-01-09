<x-guest-layout>
    <div class="flex flex-col gap-2 py-2">
        <pre class="w-full overflow-x-auto">
            @php
                print_r($posts);
            @endphp
        </pre>
        <ul>
        @foreach($posts as $post)
            <li>{{ $post->id }}, {{ $post->title }}</li>
        @endforeach
        </ul>
    </div>
</x-guest-layout>
