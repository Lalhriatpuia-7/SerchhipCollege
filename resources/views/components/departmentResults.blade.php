@props(['departmentname', 'count', 'year', 'dbsubjectname', 'deptsubjectname', 'passedrecord', 'sessions', 'reqyear'])
<div class="big-box" style="align-content: center">
    <div class="container-box">
        <div class="sidebox">
            <div class="" style="margin-top:20px">

                <h1 class="title-head">Department wise Results {{ $reqyear }}</h1>
                <br>
            </div>
            <div class="scrollable-box">
                <table style="width: 100%; ">
                    <thead>
                        <tr>
                            <th>Sl.no</th>

                            <th>Department Name</th>
                            <th>Subject Name</th>
                            <th>No of students appeared</th>
                            <th>No of students passed</th>
                            <th>Passed Percent</th>


                        </tr>
                    </thead>
                    <tbody class="" style="width: 100%;   ">
                        @foreach ($departmentname as $department)
                            @foreach ($dbsubjectname as $subj)
                                <tr style="width: 100%">
                                    <td> {{ $count++ }}</td>

                                    <td> {{ $department->name }} </td>
                                    <td>
                                        {{ $subj->name }}

                                    </td>
                                    <td> {{ $deptsubjectname[$reqyear][$department->name][$subj->name]['results_appeared'] }}
                                    </td>
                                    <td> {{ $deptsubjectname[$reqyear][$department->name][$subj->name]['results_passed'] }}
                                    </td>

                                    <td>{{ $deptsubjectname[$reqyear][$department->name][$subj->name]['results_appeared'] == 0
                                        ? 0
                                        : round(
                                            ($deptsubjectname[$reqyear][$department->name][$subj->name]['results_passed'] /
                                                $deptsubjectname[$reqyear][$department->name][$subj->name]['results_appeared']) *
                                                100,
                                            2,
                                        ) }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                    </tbody>
                </table>
                <div>



                </div>
            </div>
        </div>

        <div class="sidebox-small"
            style="width: 40%; justify-items:center;  overflow-y:auto; overflow-x:hidden; height:940px">
            <form method="POST" action="/academic/results/show-results" name="search by year" id="search by year">
                @csrf

                <div>
                    <input type="text" id="search_year" name="search_year" placeholder="Search by year"
                        style="width: 80%" class="searchbox">
                </div>
            </form>
            {{-- <form method="" action="/academic/results/show-results" name="sessionbtn" id="sessionbtn"> --}}
            @csrf
            @for ($reqsession = $year; $reqsession >= $reqyear; $reqsession--)
                <button class="sessionresult-btn" type="submit" id="currentsession-btn" name="currentsession-btn"
                    onclick="selectSession($reqsession)">
                    <div class="inner_sessionresult-btn">
                        <div>Current session </div>
                        <div>{{ $reqsession }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Total passed </div>
                        <div>{{ $passedrecord[$reqsession]['pass_count'] }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Passed Percent</div>
                        <div>
                            {{ $passedrecord[$reqsession]['all_results_count'] == 0
                                ? 0
                                : round(($passedrecord[$reqsession]['pass_count'] / $passedrecord[$reqsession]['all_results_count']) * 100, 2) }}
                        </div>
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

    </div>

</div>
