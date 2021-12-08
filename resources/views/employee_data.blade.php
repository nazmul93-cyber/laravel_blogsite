<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="search">
        <input type="search" name="search" id="" placeholder="your search term">
        <input type="submit" value="search">
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Company</th>
            <th scope="col">Last Login</th>
          </tr>
        </thead>
        <tbody>
            {{-- {{ dd($data) }} --}}
            @foreach ( $data as $info)
                <tr>
                    <th scope="row">{{ $info->id }}</th>
                    <td>{{ $info->name }}</td>
                    <td>{{ $info->email }}</td>
                    <td>{{ $info->company->name }}</td>
{{--                    <td>{{ $info->logins()->latest()->first()->created_at->diffForHumans()}}</td>--}}
{{--                    <td>{{ $info->last_login_at->diffForHumans() }}</td>--}}
                    <td>{{ $info->lastLogin->created_at->diffForHumans() }}
                        <span class="text-xs text-grey-400">({{ $info->lastLogin->ip_address }})</span>
                    </td>
              </tr>
            @endforeach

        </tbody>
      </table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

