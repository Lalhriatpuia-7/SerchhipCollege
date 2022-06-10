@props(['nowrecords', 'count'])
<div class="big-box" style="align-content: center ">
    <div>
        <div class="" style="margin-top:40px">
            <br>
            <h1 class="title-head">Results</h1>
            <br>
        </div>
        <div class="scrollable-box">
            <table style="width: 100% ">
                <thead>
                    <tr>
                        <th>Sl.no</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Internal Marks</th>
                        <th>External Marks</th>
                        <th>Total Marks</th>
                        <th>Full Mark</th>
                        <th>Pass Mark</th>
                        <th>Result</th>
                        <th>Session</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nowrecords as $result)
                        <tr>
                            <td> {{ $count++ }}</td>
                            <td> {{ $result->first_name }} {{ $result->middle_name }} {{ $result->last_name }}
                            </td>
                            <td> {{ $result->department_name }}</td>
                            <td> {{ $result->internal_mark_scored }}</td>
                            <td> {{ $result->external_mark_scored }}</td>
                            <td>{{ $result->internal_mark_scored + $result->external_mark_scored }}</td>
                            <td>100</td>
                            <td>33</td>
                            <td>{{ $result->result_status }}</td>
                            <td>{{ $result->session }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
