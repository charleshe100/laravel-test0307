<!DOCTYPE html>
<html lang="en">

<head>
    <title>Studnet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <link rel="stylesheet" href="http://localhost/css/style.css"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.index') }}">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mobiles.index') }}">Mobiles</a>
                </li>
            </ul>
        </div>
    </nav>

    @php
        // dd($test);
        // dd($data);
        // $test = $data['test'];

    @endphp
    

    <div class="container mt-3">
        <h2>Student List</h2>
        <p>Lorem ipsum dolor sit amet.</p>
        <div class="text-end">
            <a href="{{ route('students.create') }}">Add</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>mobile_student_id</th>
                    <th>mobile_mobile</th>
                    <th>operate</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>
                            {{ $item->id }}
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->mobileRelation->student_id }}
                        </td>
                        <td>
                            {{ $item->mobileRelation->mobile }}
                        </td>
                        <td>
                            <form action="{{ route('students.destroy', ['student' => $item->id ]) }}" method="post">
                                @method('DELETE')  
                                @csrf 
                            <a class="btn btn-warning" href="{{ route('students.edit', ['student' => $item->id ]) }}">Edit</a> &nbsp;&nbsp;&nbsp;
                            <button type="sumit" class="btn btn-danger">Del</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {

        });
    </script>
</body>

</html>
