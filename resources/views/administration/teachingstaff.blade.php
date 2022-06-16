<x-layout>
    <x-highlight />

    <div class="big-box" style="align-content: center">
        <div style="width: 90%">
            <div class="" style="margin-top:40px">
                <br>
                <h1 class="title-head">Administration</h1>
                <br>
                <br>
                <h1 class="title-head">Teaching Staff</h1>
                <br>
            </div>
            <div class="staff-outerbox" style="display: flex; flex-direction:row; flex-wrap:wrap">
                @foreach ($teachingstaff as $user)
                    <div class="staffbox" style="display:flex; flex-direction:column; ">
                        <div><img src="/storage/{{ $user->avatar }}"
                                style="object-fit:cover; height:auto; padding:10px; margin:10px"></div>
                        <div class="title" style><a style="color:rgb(0, 0, 0)"
                                href="{{ route('administration.teachingstaffdetails', ['slug' => $user->slug]) }}">
                                Prof. {{ ucfirst($user->first_name) }}
                                {{ $user->middle_name }} {{ $user->last_name }}</a></div>
                        <div class="" style="color:rgb(0, 0, 0)"><a style="color:rgb(0, 0, 0)"
                                href="">username: {{ $user->username }}</a></div>
                        <div class="" style=""><a style="color:rgb(0, 0, 0)" href="">email:
                                {{ $user->email }}</a></div>
                        <div class="" style=""><a style="color:rgb(0, 0, 0)" href="">phone:
                                {{ $user->contact_number }}</a>
                        </div>
                        <div class="" style=""><a style="color:rgb(0, 0, 0)" href="">subject teached:
                                {{ $user->name }}</a>
                        </div>
                        <div class="" style=""><a style="color:rgb(0, 0, 0)" href="">qualification:
                                {{ $user->qualification }}</a>
                        </div>
                        <div class="" style=""><a style="color:rgb(0, 0, 0)" href="">experience:
                                {{ now()->year - $user->start_date }}</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</x-layout>
