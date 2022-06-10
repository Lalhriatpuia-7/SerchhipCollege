@props(['departmentresults', 'departmentname', 'count', 'year', 'subjectresults', 'subjectname', 'passedrecord', 'sessions', 'passedrecorddept'])
<div class="big-box" style="align-content: center">
    <div class="container-box">
        <div class="sidebox">
            <div class="" style="margin-top:20px">

                <h1 class="title-head">Department wise Results {{ $year }}</h1>
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



                        {{-- @foreach ($departmentname as $dept)
                            ${'passedrecorddept'. $dept->name} =
                            $passedrecorddept[$session->session][$department->name]['all_results']
                            ->where('department_name', $dept->name);
                        @endforeach --}}


                        @foreach ($sessions as $session)
                            @foreach ($departmentname as $department)
                                @foreach ($passedrecorddept as $record)
                                @endforeach
                                <tr style="width: 100%">
                                    <td> {{ $count++ }}</td>

                                    <td> {{ $department->name }} </td>
                                    <td @if ($passedrecorddept[$session->session][$department->name]['all_results'])  @endif>
                                        {{ $passedrecorddept[$session->session][$department->name]['all_results'] }}

                                    </td>
                                    <td> {{ $passedrecorddept[$session->session][$department->name]['all_results_count'] }}
                                    </td>
                                    <td> {{ $passedrecorddept[$session->session][$department->name]['pass_count'] }}
                                    </td>

                                    <td>{{ $passedrecorddept[$session->session][$department->name]['all_results_count'] == 0 ? 0 : round(($passedrecorddept[$session->session][$department->name]['pass_count'] / $passedrecorddept[$session->session][$department->name]['all_results_count']) * 100, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                        {{-- @foreach ($departmentname as $department)
                            @foreach ($subjectname as $subj)
                                <tr style="width: 100%">
                                    <td> {{ $count++ }}</td>

                                    <td> {{ $department->name }} </td>
                                    <td> {{ $subj->name }} </td>
                                    <td> {{ $subjectresults[$department->name][$subj->name . 'appeared_count'][$year] }}
                                    </td>
                                    <td> {{ $subjectresults[$department->name][$subj->name . 'passed_count'][$year] }}
                                    </td>

                                    <td>{{ $subjectresults[$department->name][$subj->name . 'appeared_count'][$year] == 0 ? 0 : round(($subjectresults[$department->name][$subj->name . 'passed_count'][$year] / $subjectresults[$department->name][$subj->name . 'appeared_count'][$year]) * 100, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach --}}


                    </tbody>
                </table>
                <div>



                </div>
            </div>
        </div>

        <div class="sidebox" style="width: 40%; justify-items:center">
            <form method="POST" action="/academic/results/show-results" name="search by year" id="search by year">
                @csrf

                <div>
                    <input type="text" id="search_year" name="search_year" placeholder="Search by year"
                        style="width: 80%" class="searchbox">
                </div>
                <button class="sessionresult-btn" type="submit" id="currentsession-btn" name="currentsession-btn">
                    <div class="inner_sessionresult-btn">
                        <div>Current session </div>
                        <div>{{ $year }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Total passed </div>
                        <div>{{ $passedrecord[$year]['pass_count'] }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Passed Percent</div>
                        <div>
                            {{ $passedrecord[$year]['all_results_count'] == 0
                                ? 0
                                : round(($passedrecord[$year]['pass_count'] / $passedrecord[$year]['all_results_count']) * 100, 2) }}
                        </div>
                    </div>
                </button>
                <button class="sessionresult-btn" type="submit" id="lastsession_btn" name="lastsession_btn">
                    <div class="inner_sessionresult-btn">
                        <div>Last session </div>
                        <div>{{ $year - 1 }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Total passed </div>
                        <div>{{ $passedrecord[$year - 1]['pass_count'] }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Passed Percent</div>
                        <div>
                            {{ $passedrecord[$year - 1]['all_results_count'] == 0
                                ? 0
                                : round(($passedrecord[$year - 1]['pass_count'] / $passedrecord[$year - 1]['all_results_count']) * 100, 2) }}
                        </div>
                    </div>
                </button>
                <button class="sessionresult-btn" type="submit" id="twoyearsago-btn" name="twoyearsago-btn">
                    <div class="inner_sessionresult-btn">
                        <div>Two years ago</div>
                        <div>{{ $year - 2 }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Total passed </div>
                        <div>{{ $passedrecord[$year - 2]['pass_count'] }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Passed Percent</div>
                        <div>
                            {{ $passedrecord[$year - 2]['all_results_count'] == 0
                                ? 0
                                : round(($passedrecord[$year - 2]['pass_count'] / $passedrecord[$year - 2]['all_results_count']) * 100, 2) }}
                        </div>
                    </div>
                </button>
                <button class="sessionresult-btn" type="submit" id="threeyearsago-btn" name="threeyearsago-btn">
                    <div class="inner_sessionresult-btn">
                        <div>Three years ago</div>
                        <div>{{ $year - 3 }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Total passed </div>
                        <div>{{ $passedrecord[$year - 3]['pass_count'] }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Passed Percent</div>
                        <div>
                            {{ $passedrecord[$year - 3]['all_results_count'] == 0
                                ? 0
                                : round(($passedrecord[$year - 3]['pass_count'] / $passedrecord[$year - 3]['all_results_count']) * 100, 2) }}
                        </div>
                    </div>
                </button>
                <button class="sessionresult-btn" type="submit" id="fouryearsago-btn" name="fouryearsago-btn">
                    <div class="inner_sessionresult-btn">
                        <div>Four years ago</div>
                        <div>{{ $year - 4 }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Total passed </div>
                        <div>{{ $passedrecord[$year - 4]['pass_count'] }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Passed Percent</div>
                        <div>
                            {{ $passedrecord[$year - 4]['all_results_count'] == 0
                                ? 0
                                : round(($passedrecord[$year - 4]['pass_count'] / $passedrecord[$year - 4]['all_results_count']) * 100, 2) }}
                        </div>
                    </div>
                </button>
                <button class="sessionresult-btn" type="submit" id="fiveyearsago-btn" name="fiveyearsago-btn">
                    <div class="inner_sessionresult-btn">
                        <div>Five years ago</div>
                        <div>{{ $year - 5 }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Total passed </div>
                        <div>{{ $passedrecord[$year - 5]['pass_count'] }}</div>
                    </div>
                    <div class="inner_sessionresult-btn">
                        <div> Passed Percent</div>
                        <div>
                            {{ $passedrecord[$year - 5]['all_results_count'] == 0
                                ? 0
                                : round(($passedrecord[$year - 5]['pass_count'] / $passedrecord[$year - 5]['all_results_count']) * 100, 2) }}
                        </div>
                    </div>
                </button>
            </form>
        </div>

    </div>

</div>
