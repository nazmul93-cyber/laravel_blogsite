<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read and Edit</title>

    <!-- internal css -->
    <style>
        td{
            text-align:center;
        }
    </style>
</head>
<body>

    <h3>Search using User Name :</h3>

    <form action="/read" method="POST">
        @csrf
        <input type="text" name="search" id="">
        <button type="submit">Search</button>   
    </form> <br />

       
        <table border="1">
        
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Designation</td>
                    <td>Edit</td>
                </tr>
            </thead>

    @foreach($kuser as $user)

            <tbody>
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->designation}}</td>
                    <td>
                        <a href="/delete/{{$user->id}}">Delete</a>
                        <a href="/update/{{$user->id}}">Update</a>
                    </td>
                </tr>
            </tbody>
    @endforeach

            
    </table>

    <!-- {{$kuser->onEachSide(1)->links()}}         did not work -->
    {{$kuser->links()}}

    <h3>To add users visit <a href="/create">here</a></h3>


    <!-- css style to remove the arrows -->
    {{-- <style>
        .w-5 {
            display: none;
        }
    </style> --}}
    
</body>
</html>