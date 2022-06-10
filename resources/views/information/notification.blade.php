<x-layout>
    <x-highlight />

    <div class="big-box" style="align-content: center">
        <div>
            <div class="" style="margin-top:40px">
                <br>
                <h1 class="title-head">Notification</h1>
                <br>
            </div>
            <div class="item-box">
                @foreach ($notification as $not)
                    <div>
                        <div>
                            {{ \carbon\carbon::parse($not->updated_at)->diffForHumans() }}
                        </div>
                        <div class="title">
                            {{ $not->subject }}
                        </div>
                        <div>
                            {{ $not->description }}
                        </div>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
