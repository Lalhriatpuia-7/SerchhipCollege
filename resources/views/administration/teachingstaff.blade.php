<x-layout>
    <x-highlight />

    <div class="big-box" style="align-content: center">
        <div>
            <div class="" style="margin-top:40px">
                <br>
                <h1 class="title-head">Administration</h1>
                <br>
                <br>
                <h1 class="title-head">Teaching Staff</h1>
                <br>
            </div>
            <div class="staff-outerbox">
                @foreach ($teachingstaff as $user)
                    <div class="staffbox" style="">
                        <img src="/storage/{{ $user->avatar }}" style="object-fit:cover; height:400px;">
                        <div class="title"><a href=""> {{ $user->first_name }}
                                {{ $user->middle_name }} {{ $user->last_name }}</a></div>
                        <div class="" style=""><a href="">username: {{ $user->username }}</a></div>
                        <div class="" style=""><a href="">email: {{ $user->email }}</a></div>
                        <div class="" style=""><a href="">phone: {{ $user->contact_number }}</a></div>
                        <div class="" style=""><a href="">subject teached: {{ $user->name }}</a></div>
                        <div class="" style=""><a href="">qualification: {{ $user->qualification }}</a>
                        </div>
                        <div class="" style=""><a href="">experience: {{ $user->experience }}</a></div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</x-layout>
