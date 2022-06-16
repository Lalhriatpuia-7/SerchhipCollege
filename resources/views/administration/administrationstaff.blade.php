<x-layout>
    <x-highlight />
    <div class="navigation">
        <a href="/">home</a>&nbsp;
        <span class="dot"></span>
        &nbsp;<a href="/administration/administrationstaff">Administration Staff</a>
    </div>
    <div class="big-box" style="align-content: center">
        <div>
            <div class="" style="margin-top:40px">
                <br>
                <h1 class="title-head">Administration</h1>
                <br>

            </div>

            <div>
                <div class="" style="margin-top:40px">

                    <h1 class="title-head">Administration Staff</h1>
                    <br>
                </div>
                <div class="staff-outerbox" style="display: flex; flex-direction:row; flex-wrap:wrap">
                    @foreach ($nonteachingstaff as $user)
                        <div class="staffbox" style="display:flex; flex-direction:column;">
                            <img src="/storage/{{ $user->avatar }}" style="object-fit:cover; height:auto;">
                            <div class="title"><a style="color:black"
                                    href="{{ route('administration.administrationstaffdetails', ['slug' => $user->slug]) }}">
                                    {{ ucfirst($user->first_name) }}
                                    {{ $user->middle_name }} {{ $user->last_name }}</a></div>
                            <div class="" style=""><a style="color:black" href="">username:
                                    {{ $user->username }}</a>
                            </div>
                            <div class="" style=""><a style="color:black" href="">email:
                                    {{ $user->email }}</a></div>
                            <div class="" style=""><a style="color:black" href="">phone:
                                    {{ $user->contact_number }}</a>
                            </div>

                            <div class="" style=""><a style="color:black" href="">qualification:
                                    {{ $user->qualification }}</a>
                            </div>
                            <div class="" style=""><a style="color:black" href="">experience:
                                    {{ now()->year - $user->start_date }}</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-layout>
