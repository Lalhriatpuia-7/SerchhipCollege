<x-layout>
    <x-highlight />
    <div class="big-box" style="flex-direction:column; flex-wrap:wrap">
        <div
            style="display: flex; flex-direction:row; padding:20px; text-align:left; margin-left:0px; margin-right:auto">
            <div>
                <img src="/storage/{{ $staff->avatar }}" alt="">
            </div>
            <div class="short-details-box">
                <div class="title">Prof. {{ ucfirst($staff->first_name) }} {{ $staff->middle_name }}
                    {{ $staff->last_name }}
                </div>
                <div>{{ $staff->name }}</div>
                <div>{{ now()->year - $staff->start_date }} years experience</div>
            </div>

        </div>
        <div class="education-box">
            <div class="title education-box-head" style="color: #ffffff">Education</div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Degree</th>
                            <th>Institution</th>
                            <th>Graduation Year</th>
                            <th>Details</th>
                    </thead>
                    <tbody>
                        @foreach ($education as $edu)
                            <tr>
                                <th>{{ $edu->qualification }}</th>
                                <th>{{ $edu->institution }}</th>
                                <th>{{ $edu->graduation_year }}</th>
                                <th>{{ $edu->staff_details }}</th>
                        @endforeach

                    </tbody>


                </table>
            </div>

        </div>

        <div class="education-box">
            <div class="title education-box-head" style="color: #ffffff">Subject/Course Taught</div>
            <div class="" style="padding: 10px; font-weight:bold ">
                @foreach ($subjects as $subj)
                    <div> {{ $subj->name }}</div><br>
                @endforeach
            </div>
        </div>
        <div class="education-box">
            <div class="title education-box-head" style="color: #ffffff">Other Details</div>
            <div style="padding: 10px; font-weight:bold">
                @foreach ($staffdetails as $subj)
                    <div> {{ $subj->staff_details }}</div><br>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
