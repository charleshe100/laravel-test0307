<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cat List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    {{-- <link rel="stylesheet" href="http://laravel_s.com/css/style.css"> --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cats.index')}}">Cats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dogs.index')}}">Dogs</a>
                </li>
            </ul>
        </div>
    </nav>
    @php
    // dd($data);
    @endphp
    <div class="container mt-3">
        <h2>Cat List</h2>
        <p>Lorem ipsum dolor sit amet.</p>
        <div class="text-end">
            <a href="{{route('cats.create')}}">Add</a>
            <a href="{{route('cats.excel')}}">Excel</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>operate</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $idx => $item)
                <tr>
                    <td>{{$idx+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a href="{{route('cats.edit',['cat' => 1])}}">Edit</a> &nbsp;&nbsp;&nbsp;
                        <a href="">Del</a>
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
