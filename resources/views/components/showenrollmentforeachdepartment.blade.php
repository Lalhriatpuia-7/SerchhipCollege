<div style="margin-bottom: 10px">
    <table>
        <thead>
            <th>{{ $department->name }} Department subjects:</th>
            <th>Semester: I</th>
            <th>Semester: III</th>
            <th>Semester: V</th>

        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $firstsem->where('subject_name', $subject->name)->where('department_name', $department->name)->count() }}
                    <td>{{ $thirdsem->where('subject_name', $subject->name)->where('department_name', $department->name)->count() }}
                    <td>{{ $fifthsem->where('subject_name', $subject->name)->where('department_name', $department->name)->count() }}
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
</div>
