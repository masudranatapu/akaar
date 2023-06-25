<div class="col-md-12">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">SL NO</th>
                <th scope="col">Branch Id</th>
                <th scope="col">First name</th>
                <th scope="col">Lasts name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Gender</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $key => $value)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $value->branch_id }}</td>
                    <td>{{ $value->f_name }}</td>
                    <td>{{ $value->l_name }}</td>
                    <td><a href="mailto:{{ $value->email }}">{{ $value->email }}</a></td>
                    <td><a href="tel:{{ $value->phone }}">{{ $value->phone }}</a></td>
                    <td>{{ $value->gender }}</td>
                    <td>
                        <button onclick="editCusotmer({{$value->id}})" class="btn btn-info">edit</button>
                        <a href="{{ route('customer.delete', $value->id) }}" onclick="return confirm('Are you sure! you want to delete this data?')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>