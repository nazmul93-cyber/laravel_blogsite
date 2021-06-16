<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!--Bootsrap 4 CDN-->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>



@if(Session::has('success'))    
<div class="card card-inverse card-success text-center alert alert-success">
  <div class="card-block">
    <blockquote class="card-blockquote">
      {{Session::get('success')}}
      @php
        Session::forget('success');
      @endphp
    </blockquote>
  </div>
</div>
@endif



    <h3>Congrats!!! Your Dashbboard is ready to use</h3>


    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>