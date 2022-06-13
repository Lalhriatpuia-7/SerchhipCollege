@props(['departmentname', 'toppers', 'subjectname', 'reqyear', 'year', 'topperscount', 'topperscurrentsession', 'topperslastsession', 'topperstwoyearsago', 'toppersthreeyearsago', 'toppersfouryearsago', 'toppersfiveyearsago'])

<div class="wrapper-container">
    <div style="margin-top: 20px; margin-bottom:20px">
        <h1 class="title">Toppers of {{ $year }} session</h1>
    </div>
    <div class="userimagedisplay-container">

        @php
            $dyear = $reqyear;
            $cyear = now()->year;
            if ($dyear = $cyear) {
                $session = $topperscurrentsession;
            } elseif ($dyear = $cyear - 1) {
                $session = $topperslastsession;
            } elseif ($dyear = $cyear - 2) {
                $session = $topperstwoyearsago;
            } elseif ($dyear = $cyear - 3) {
                $session = $toppersthreeyearsago;
            } elseif ($dyear = $cyear - 4) {
                $session = $toppersfouryearsago;
            } elseif ($dyear = $cyear - 5) {
                $session = $toppersfiveyearsago;
            }
            
        @endphp @foreach ($session as $dname)
            <div class="userimagedisplay-box">
                <div>
                    <img src="/storage/{{ $dname->avatar }}" class="" style="border-radius: 4%">
                </div>
                <div>
                    {{ $dname->firstname }} {{ $dname->middlename }} {{ $dname->lastname }}
                </div>
                <div>{{ $dname->rank }}</div>
                <div>{{ $dname->subjectname }}</div>
            </div>
        @endforeach


    </div>
</div>
