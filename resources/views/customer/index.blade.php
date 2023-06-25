<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akeer It Task- Masud Rana Tapu</title>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Akaar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('c_list') }}">Customer List</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Customer List : (Total cutomer : {{ $customers->count() }})</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#Addcustomer">
                            Add cutomer
                        </button>
                        <div class="modal fade" id="Addcustomer" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Customer</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('customer.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Branch</label>
                                                <select name="branch_id" class="form-control">
                                                    <option value="1">Develop</option>
                                                    <option value="2">App</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">First Name <span class="text-danger">*</span></label>
                                                <input type="text" name="f_name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">First Name <span class="text-danger">*</span></label>
                                                <input type="text" name="l_name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email<span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Phone</label><span class="text-danger">*</span></label>
                                                <input type="number" name="phone" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Phone</label><span class="text-danger">*</span></label>
                                                <select name="gender" class="form-control">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
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
                                <tr>
                                    <th colspan="3">
                                        Total Male Customer : {{ $m_cus ?? 0 }}
                                    </th>
                                    <th colspan="3">
                                        Total Female Customer : {{ $f_cus ?? 0 }}
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="datashow">
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function editCusotmer(id) {
            // alert(id);
            if(id){
                $.ajax({
                    type    : "POST",
                    url     : "{{ route('customer.edit') }}",
                    data    : {
                        id: id,
                        _token: '{{csrf_token()}}',
                    },
                    success : function(data) {
                        console.log(data);
                        $("#editCustomer").modal('show');
                        $("#datashow").html(data);
                    },
                });
            }else {
                alert('Customer not defiend');
            }
        };
    </script>
</body>

</html>
