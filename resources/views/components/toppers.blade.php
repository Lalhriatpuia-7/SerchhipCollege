@props(['departmentname', 'toppers', 'requetresult', 'subjectname', 'reqyear', 'year', 'topperscount', 'topperscurrentsession', 'topperslastsession', 'topperstwoyearsago', 'toppersthreeyearsago', 'toppersfouryearsago', 'toppersfiveyearsago'])

<div class="wrapper-container">
    <div style="margin-top: 20px; margin-bottom:20px">
        <h1 class="title">Toppers of {{ $reqyear }} session</h1>
    </div>
    <div class="userimagedisplay-container">

        @foreach ($requetresult as $result)
            <div class="userimagedisplay-box">
                <div>
                    <img src="/storage/{{ $result->avatar }}" class="" style="border-radius: 4%">
                </div>
                <div>
                    {{ $result->firstname }} {{ $result->middlename }} {{ $result->lastname }}
                </div>
                <div>{{ $result->rank }}</div>
                <div>{{ $result->subjectname }}</div>
            </div>
        @endforeach


    </div>
</div>
