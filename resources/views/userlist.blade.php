<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User list</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }
    </script>

</head>

<body>
    <div class="gradient">


        <div class="container-fluid">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="register" id="adduser">Add User</a>
                </li>
            </ul><br>
        </div>
        <div class="container">
            @if($message= Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{$message}}</strong>
            </div>
            @endif
        </div>
        <div class="container" id="userlist">
            <h2>User list</h2>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Image</th>
                        <th>Days for birthday</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $datas)

                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$datas->name}}</td>
                        <td>{{$datas->email}}</td>
                        <td>{{$datas->phone}}</td>
                        <td>{{$datas->address}}</td>

                        <td>{{ \Carbon\Carbon::parse($datas->dob)->format('d-m-Y') }}</td>

                        <td>
                            <img src="uploads/{{$datas->image}}" class="rounded-circle" width="50" height="50" alt="user image" />
                        </td>
                        
                        <td>{{ $datas->days_to_birthday }}</td>

                        <td>
                            <form method="POST" action="data/{{$datas->id}}/delete">
                                @csrf
                                @method('DELETE')   
                                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirmDelete()">Delete</button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</body>
</div>

</html>