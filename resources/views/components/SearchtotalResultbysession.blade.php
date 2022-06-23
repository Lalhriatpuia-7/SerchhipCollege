@props(['year', 'reqyear', 'reqrecord'])
<div class="sidebox-small" style="width: 100%; justify-items:center;  overflow-y:auto; overflow-x:hidden; height:auto">
    <form method="POST" action="/registration/show-student-enrollment" name="search by year" id="search by year">
        @csrf

        <div>
            <input type="text" id="search_year" name="search_year" placeholder="Search by year" style="width: 80%"
                class="searchbox">
        </div>
    </form>
    {{-- <form method="" action="/academic/results/show-results" name="sessionbtn" id="sessionbtn"> --}}
    @csrf
    @for ($reqsession = $year; $reqsession >= $reqyear; $reqsession--)
        <button style="color: black" class="sessionresult-btn" type="submit" id="currentsession-btn"
            name="currentsession-btn" onclick="selectSession($reqsession)">
            <div class="inner_sessionresult-btn">
                <div>Session</div>
                <div>{{ $reqsession }}</div>
            </div>
            <div class="inner_sessionresult-btn">
                <div> Total Students Enrolled</div>
                <div>{{ $reqrecord }}</div>
            </div>

        </button>
    @endfor
    {{-- </form> --}}
    <script>
        const name = document.querySelector(".sessionresult-btn");
        const searchbar = document.querySelector(".searchbox");

        function selectSession($session) {
            $reqyear = $name;
        }
    </script>

</div>
