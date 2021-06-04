<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update info</title>
</head>
<body>
    <h3>Update Users Info : </h3>
    <form action="/update" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$uprow->id}}">
        <input type="text" name="name" id="" placeholder="Your Name" value="{{$uprow->name}}">   <br /><br />
        <input type="email" name="email" id="" placeholder="Your Email" value="{{$uprow->email}}">  <br /><br />
        <input type="text" name="designation" id="" placeholder="Your Designation" value="{{$uprow->designation}}">   <br /><br />

        <button type="submit"> Update </button>
    </form> <br /><br /><br />
</body>
</html>