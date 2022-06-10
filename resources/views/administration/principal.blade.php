<x-layout>
    <x-highlight />

    <div class="big-box" style="align-content: center">
        <div>
            <div class="" style="margin-top:40px">
                <br>
                <h1 class="title-head">Administration</h1>
                <br>
                <br>
                <h1 class="title-head">Principal</h1>
                <br>
            </div>
            <div class="staff-outerbox">
                @foreach ($administrations as $admin)
                    <div class="staffbox" style="">
                        <img src="/storage/{{ $admin->avatar }}" style="object-fit:cover; height:400px;">
                        <div class="title"><a href=""> {{ $admin->first_name }}
                                {{ $admin->middle_name }} {{ $admin->last_name }}</a></div>
                        <div class="" style=""><a href="">username: {{ $admin->username }}</a></div>
                        <div class="" style=""><a href="">email: {{ $admin->email }}</a></div>
                        <div class="" style=""><a href="">phone: {{ $admin->contact_number }}</a></div>
                    </div>
                @endforeach

            </div>
        </div>


    </div>
</x-layout>
