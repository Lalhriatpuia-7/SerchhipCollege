<x-layout>
    <x-highlight />
    <br>
    <div class="graph-flex">
        <div class="inner-graph" style="width: 60%; height:auto; ">
            <h1 class="title" style="text-align: center">Results Overall</h1>
            <canvas id="myChart" width="100" height="100"></canvas>
            <script>
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {

                        labels: [{{ $year - 5 }}, {{ $year - 4 }}, {{ $year - 3 }}, {{ $year - 2 }},
                            {{ $year - 1 }}, {{ $year }}
                        ],
                        datasets: [{

                                label: 'Number of Students Appeared for exam in the last five years',
                                data: [{{ $five_years_ago_appeared }}, {{ $four_years_ago_appeared }},
                                    {{ $three_years_ago_appeared }},
                                    {{ $before_last_year_appeared }}, {{ $last_year_appeared }},
                                    {{ $now_appeared }}
                                ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1

                            },
                            {
                                label: 'Number of Students Passed in the last five years',
                                data: [{{ $five_years_ago_passed }}, {{ $four_years_ago_passed }},
                                    {{ $three_years_ago_passed }},
                                    {{ $before_last_year_passed }}, {{ $last_year_passed }},
                                    {{ $now_passed }}
                                ],

                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }

                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }

                });
            </script>
        </div>
        <x-doughnutchart :nowpassed="$now_passed" :nowappeared="$now_appeared" :lastyearpassed="$last_year_passed" :lastyearappeared="$last_year_appeared" :beforelastyearpassed="$before_last_year_passed"
            :beforelastyearappeared="$before_last_year_appeared" :threeyearsagopassed="$three_years_ago_passed" :threeyearsagoappeared="$three_years_ago_appeared" :fouryearsagopassed="$four_years_ago_passed" :fouryearsagoappeared="$four_years_ago_appeared" :fiveyearsagopassed="$five_years_ago_passed"
            :fiveyearsagoappeared="$five_years_ago_appeared" />
    </div>
    <br>
    {{-- <x-allresults :nowrecords="$nowrecords" :count="$count" /> --}}
    <br>

    <x-departmentResults :departmentresults="$departmentresults" :subjectresults="$subjectresults" :count="$count" :departmentname="$departmentname" :year="$year"
        :subjectname="$subjectname" :passedrecord="$passed_record" :sessions="$sessions" :passedrecorddept="$passed_record_dept" :deptsubjectname="$deptsubjectname"
        :dbsubjectname="$dbsubjectname" :reqyear="$reqyear" />
    <br>
    <x-toppers :toppers="$toppers" :year="$year" :departmentname="$departmentname" :subjectname="$subjectname" :topperscurrentsession="$topperscurrentsession"
        :topperslastsession="$topperslastsession" :topperstwoyearsago="$topperstwoyearsago" :toppersthreeyearsago="$toppersthreeyearsago" :toppersfouryearsago="$toppersfouryearsago" :toppersfiveyearsago="$toppersfiveyearsago"
        :reqyear="$reqyear" :requetresult="$requetresult" />


</x-layout>
