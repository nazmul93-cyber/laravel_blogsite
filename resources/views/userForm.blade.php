<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>
<body>

    <h3>Add Users Info : </h3>
    <form action="/create" method="POST">
        @csrf
        <input type="text" name="name" id="" placeholder="Your Name">   <br /><br />
        <input type="email" name="email" id="" placeholder="Your Email">  <br /><br />
        <input type="text" name="designation" id="" placeholder="Your Designation">   <br /><br />

        <button type="submit"> Add </button>
    </form> <br /><br /><br />
    
</body>
</html>