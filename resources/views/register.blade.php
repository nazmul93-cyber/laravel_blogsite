<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>

    <!-- bootstrap css cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

<div class="container" style="margin-top:5vh;">


<!-- @if(Session::has('success'))
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
@endif -->



<form class="needs-validation" novalidate action="/register" method="POST">
@csrf
<div class="form-row">      <!-- this div contains 3 columns above md -->
    <div class="col-md-4 mb-3">
      <label for="field1">Name</label>
      <input type="text" name="name" class="form-control" id="field1" placeholder="Your Name" required>
      @if($errors->has('name'))
        <div class="text-danger">
            {{$errors->first('name')}}
        </div>
      @endif
    </div>

    <div class="col-md-4 mb-3">
      <label for="field2">Phone</label>
      <input type="number" name="phone" class="form-control" id="field2" placeholder="Your phone number" required>
      @if($errors->has('phone'))
        <div class="text-danger">
            {{$errors->first('phone')}}
        </div>
      @endif
    </div>

    <div class="col-md-4 mb-3">
      <label for="field3">Email</label>
      <input type="email" name="email" class="form-control" id="field3" placeholder="Your email" aria-describedby="inputGroupPrepend" required>
      @if($errors->has('email'))
        <div class="text-danger">
            {{$errors->first('email')}}
        </div>
      @endif
      
    </div>
</div>

<div class="form-row">  <!-- this div contains 2 columns above md -->
    <div class="col-md-4 mb-3">
      <label for="field4">Address</label>
      <input type="text" name="address" class="form-control" id="field4" placeholder="Your City,Contry" >
    </div>

    <div class="col-md-4 mb-3">
      <label for="field5">Password</label>
      <input type="password" name="password" class="form-control" id="field5" placeholder="Your password" required>
      @if($errors->has('password'))
        <div class="text-danger">
            {{$errors->first('password')}}
        </div>
      @endif
    </div>
    
    <div class="col-md-4 mb-3">
      <label for="field6">Confirm Password</label>
      <input type="password" name="confirm_password" class="form-control" id="field6" placeholder="Your password again" required>
      @if($errors->has('confirm_password'))
        <div class="text-danger">
            {{$errors->first('confirm_password')}}
        </div>
      @endif
    </div>
<div>

    <button class="btn btn-primary" type="submit">Submit form</button>


</form>

<!-- bootstrap js cdn -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
</body>
</html>