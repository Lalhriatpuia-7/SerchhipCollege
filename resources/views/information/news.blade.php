<x-layout>
    <x-highlight />

    <div class="item-outerbox" style="align-content: center">
        <div>
            <div class="" style="margin-top:40px">
                <br>
                <h1 class="title-head">News</h1>
                <br>
            </div>
            <div class="item-box">
                @foreach ($news as $newsitem)
                    <div>
                        <div>
                            {{ \carbon\carbon::parse($newsitem->updated_at)->diffForHumans() }}
                        </div>
                        <div class="title">
                            {{ $newsitem->name }}
                        </div>
                        <div>
                            {{ $newsitem->description }}
                        </div>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="linewall">

        </div>
        <div class="item-box" style="text-align:center">
            <br>
            <div style="margin-top: 40px">
                <img src="/storage/{{ $users->avatar }}" class="rounded-image">
            </div>
            <a href="" class="title">Principal</a>
            <div>

                {{ $users->first_name }} {{ $users->middle_name }} {{ $users->last_name }}
            </div>
            <div class="">

                {{ $principaldata->qualification }}


            </div>
            <div>
                The principal has a total experience of
                {{ now()->year - $principaldata->start_date }}
                years. And a very capable hand.
            </div>

        </div>

    </div>



</x-layout>
