@props(['nowpassed', 'nowappeared', 'lastyearpassed', 'lastyearappeared', 'beforelastyearpassed', 'beforelastyearappeared', 'threeyearsagopassed', 'threeyearsagoappeared', 'fouryearsagopassed', 'fouryearsagoappeared', 'fiveyearsagopassed', 'fiveyearsagoappeared'])
<div class="graph-flex-2cols" style="height: auto">

    <div class="grid-inner">
        <h1 style="text-align: center">This year results</h1>
        <canvas id="myChart-doughnut" width="auto" height="auto"></canvas>
        <script>
            const ctx0 = document.getElementById('myChart-doughnut').getContext('2d');
            const myChartdoughnut = new Chart(ctx0, {
                type: 'doughnut',
                data: {

                    labels: ['Passed', 'Failed'],
                    datasets: [{

                        label: 'Passed and failed ratio',
                        data: [{{ $nowpassed }},
                            {{ $nowappeared - $nowpassed }}
                        ],

                        backgroundColor: [
                            '#5b9bd5',
                            '#e7e6e6',



                        ],
                        borderColor: [
                            '#5b9bd5',
                            '#e7e6e6',




                        ],
                        borderWidth: 1

                    }, ]
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
    <div class="grid-inner">
        <h1 style="text-align: center">Last year results</h1>
        <canvas id="myChart-doughnut1" width="auto" height="auto"></canvas>
        <script>
            const ctx1 = document.getElementById('myChart-doughnut1').getContext('2d');
            const myChartdoughnut1 = new Chart(ctx1, {
                type: 'doughnut',
                data: {

                    labels: ['Passed', 'Failed'],
                    datasets: [{

                        label: 'Passed and failed ratio',
                        data: [{{ $lastyearpassed }},
                            {{ $lastyearappeared - $lastyearpassed }}
                        ],

                        backgroundColor: [
                            '#5b9bd5',
                            '#e7e6e6',


                        ],
                        borderColor: [
                            '#5b9bd5',
                            '#e7e6e6',




                        ],
                        borderWidth: 1

                    }, ]
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

    <div class="grid-inner">
        <h1 style="text-align: center">Results before last year</h1>
        <canvas id="myChart-doughnut2" width="auto" height="auto"></canvas>
        <script>
            const ctx2 = document.getElementById('myChart-doughnut2').getContext('2d');
            const myChartdoughnut2 = new Chart(ctx2, {
                type: 'doughnut',
                data: {

                    labels: ['Passed', 'Failed'],
                    datasets: [{

                        label: 'Passed and failed ratio',
                        data: [{{ $beforelastyearpassed }},
                            {{ $beforelastyearappeared - $beforelastyearpassed }}
                        ],

                        backgroundColor: [
                            '#5b9bd5',
                            '#e7e6e6',



                        ],
                        borderColor: [
                            '#5b9bd5',
                            '#e7e6e6',




                        ],
                        borderWidth: 1

                    }, ]
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

    <div class="grid-inner">
        <h1 style="text-align: center">Results three years ago</h1>
        <canvas id="myChart-doughnut3" width="auto" height="auto"></canvas>
        <script>
            const ctx3 = document.getElementById('myChart-doughnut3').getContext('2d');
            const myChartdoughnut3 = new Chart(ctx3, {
                type: 'doughnut',
                data: {

                    labels: ['Passed', 'Failed'],
                    datasets: [{

                        label: 'Passed and failed ratio',
                        data: [{{ $threeyearsagopassed }},
                            {{ $threeyearsagoappeared - $threeyearsagopassed }}
                        ],

                        backgroundColor: [
                            '#5b9bd5',
                            '#e7e6e6',



                        ],
                        borderColor: [
                            '#5b9bd5',
                            '#e7e6e6',




                        ],
                        borderWidth: 1

                    }, ]
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

    <div class="grid-inner">
        <h1 style="text-align: center">Results four years ago</h1>
        <canvas id="myChart-doughnut4" width="auto" height="auto"></canvas>
        <script>
            const ctx4 = document.getElementById('myChart-doughnut4').getContext('2d');
            const myChartdoughnut4 = new Chart(ctx4, {
                type: 'doughnut',
                data: {

                    labels: ['Passed', 'Failed'],
                    datasets: [{

                        label: 'Passed and failed ratio',
                        data: [{{ $fouryearsagopassed }},
                            {{ $fouryearsagoappeared - $fouryearsagopassed }}
                        ],

                        backgroundColor: [
                            '#5b9bd5',
                            '#e7e6e6',



                        ],
                        borderColor: [
                            '#5b9bd5',
                            '#e7e6e6',




                        ],
                        borderWidth: 1

                    }, ]
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

    <div class="grid-inner">
        <h1 style="text-align: center">Results five years ago</h1>
        <canvas id="myChart-doughnut5" width="auto" height="auto"></canvas>
        <script>
            const ctx5 = document.getElementById('myChart-doughnut5').getContext('2d');
            const myChartdoughnut5 = new Chart(ctx5, {
                type: 'doughnut',
                data: {

                    labels: ['Passed', 'Failed'],
                    datasets: [{

                        label: 'Passed and failed ratio',
                        data: [{{ $fiveyearsagopassed }},
                            {{ $fiveyearsagoappeared - $fiveyearsagopassed }}
                        ],

                        backgroundColor: [
                            '#5b9bd5',
                            '#e7e6e6',



                        ],
                        borderColor: [
                            '#5b9bd5',
                            '#e7e6e6',




                        ],
                        borderWidth: 1

                    }, ]
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
