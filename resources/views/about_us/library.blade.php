<x-layout>
    <x-highlight />
    <div class="navigation">
        <a href="/">About us</a>&nbsp;
        <span class="dot"></span>
        &nbsp;<a href="/about-us/library">Library</a>
    </div>
    <div class="big-box" style="align-content: center">
        <div>
            <div class="" style="margin-top:40px">
                <br>
                <h1 class="title-head">Library</h1>
                <br>
            </div>
            <div class="post-box">

                @foreach ($pages as $page)
                    <img src="/storage/{{ $page->image }}" class="post-image" style="width:100%">
                    <br>
                    <div class="post-title">{{ strip_tags($page->title) }}</div>
                    <br>
                    <div class="post-body">{{ strip_tags($page->body) }}</div>
                    <br>
                @endforeach

            </div>
        </div>
    </div>
</x-layout>
