<x-layout>
    <x-highlight />
    <div class="navigation">
        <a href="/">About us</a>&nbsp;
        <span class="dot"></span>
        &nbsp;<a href="/about-us/college">Govt. Serchhip College</a>
    </div>

    <div class="big-box" style="align-content: center">
        <div>
            <div class="" style="margin-top:40px">
                <br>
                <h1 class="title-head">About us</h1>
                <br>
            </div>
            <div class="post-box">

                @foreach ($pages as $abt)
                    <img src="/storage/{{ $abt->image }}" class="post-image" style="width:100%">
                    <br>
                    <div class="post-title">{{ strip_tags($abt->title) }}</div>
                    <br>
                    <div class="post-body">{{ strip_tags($abt->body) }}</div>
                    <br>
                @endforeach

            </div>
        </div>
    </div>
</x-layout>
