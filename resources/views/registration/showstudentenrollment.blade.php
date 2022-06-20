<x-layout>
    <x-highlight />
    <div class=""
        style="box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.192); width:90%; align-self:center; align-items:center; display:flex; flex-direction:column">
        <div
            style="width: 90%; align-self:center; box-shadow:0px 0px 0px 1px rgba(0, 0, 0, 0.16); padding:10px; margin:10px">
            <h1 class="title" style="margin-left: 10px; text-align:center"> Past five years Enrollment Representation
            </h1>
            <div class="enrollmentflex-box">
                <div class="table-shadow">
                    <table>
                        <thead>
                            <th>Session</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $year }}</td>
                                <td>{{ $thissession }}</td>
                            <tr>
                                <td>{{ $year - 1 }}</td>
                                <td>{{ $lastsession }}</td>
                            <tr>
                                <td>{{ $year - 2 }}</td>
                                <td>{{ $sessiontwoyearsago }}</td>
                            <tr>
                                <td>{{ $year - 3 }}</td>
                                <td>{{ $sessionthreeyearsago }}</td>
                            <tr>
                                <td>{{ $year - 4 }}</td>
                                <td>{{ $sessionfouryearsago }}</td>
                        </tbody>
                    </table>
                </div>
                <div class="enrollment-graph-flex">
                    <div class="inner-graph" style="width: 60%; height:auto; ">
                        <h1 class="title" style="text-align: center">Results Overall</h1>
                        <canvas id="myChart" width="100" height="100"></canvas>
                        <script>
                            const ctx = document.getElementById('myChart').getContext('2d');
                            const myChart = new Chart(ctx, {
                                type: 'line',
                                data: {

                                    labels: [{{ $year - 4 }}, {{ $year - 3 }}, {{ $year - 2 }},
                                        {{ $year - 1 }}, {{ $year }}
                                    ],
                                    datasets: [{

                                            label: 'Number of Students registered in the last four years',
                                            data: [{{ $sessionfouryearsago }},
                                                {{ $sessionthreeyearsago }},
                                                {{ $sessiontwoyearsago }}, {{ $lastsession }},
                                                {{ $thissession }}
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

                </div>
            </div>
        </div>
        <div style="width:90%;  box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.192);">
            <div style="padding: 10px; margin:10px">
                <h1 class="title" style="margin-left: 10px">Academic Session: {{ $reqyear }}</h1>
            </div>
            <div class="display-enrollment-info">
                <div class="showenrollmenttable">
                    @foreach ($departments as $department)
                        <x-showenrollmentforeachdepartment :department="$department" :subjects="$subjects" :year="$year"
                            :reqyear="$reqyear" :firstsem="$firstsem" :thirdsem="$thirdsem" :fifthsem="$fifthsem" />
                    @endforeach
                </div>
                <div style="width: 30%; padding:10px; margin:10px">
                    <x-SearchtotalResultbysession :year="$year" :reqyear="$reqyear" :reqrecord="$reqrecord" />
                </div>
            </div>
        </div>
    </div>
</x-layout>
