<x-layout>

    <body class="antialiased">

        <x-highlight />
        <div class="navigation" style="font-size:small; font-weight:normal; margin-top:-50px; margin-bottom:50px">
            Somethings to add here
        </div>

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

                    {{ ucfirst($users->first_name) }} {{ $users->middle_name }} {{ $users->last_name }}
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
        <div class="big-box ">
            <div>
                <h1 class="title-head" style="text-align: center">Academic Stream</h1>
            </div>
            <div class="" style="align-content: center">
                <div class="streambox">
                    @foreach ($subjects as $subject)
                        <div style="height: 400px; width:400px; padding: 10px; text-center" class="">
                            <div class="" style="width: 100%; height:100%;">
                                <img src="/storage/Defaulted and Hardcoded/Chemistryimg.jpg"
                                    style="object-fit:cover; height:400px;">
                                <div style="">
                                    <h1 class="title">
                                        {{ $subject->name }}
                                    </h1>
                                </div>

                            </div>


                        </div>
                    @endforeach
                    <br>
                </div>



            </div>
        </div>

        </html>
    </body>
</x-layout>
