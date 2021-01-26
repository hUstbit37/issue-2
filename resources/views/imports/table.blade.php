<table class="table table-bordered">
    <thead class="thead-dark">
    <tr>
        <th rowspan="2">ID</th>
        <th rowspan="2">Name</th>
        <th rowspan="2">Email</th>
        <th rowspan="2">Phone</th>
        <th rowspan="2">Address</th>
        <th rowspan="2">School</th>
        <th colspan="2">Date Time</th>
    </tr>
    <tr>
        <th>Created</th>
        <th>Updated</th>
    </tr>
    </thead>
    <tbody>
    @for($i=2; $i < count($user); $i++)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->school->school }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
        </tr>
    @endfor
    </tbody>
</table>
