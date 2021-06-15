<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">

<!-- flash for success  -->
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

@if(Session::has('failed'))    
<div class="card card-inverse card-success text-center alert alert-danger">
  <div class="card-block">
    <blockquote class="card-blockquote">
      {{Session::get('failed')}}
      @php
        Session::forget('failed');
      @endphp
    </blockquote>
  </div>
</div>
@endif



	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Please Sign In</h3>
			</div>
			<div class="card-body">
				<form method="POST" action="/login">   <!-- match with the route   -->
                @csrf
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="email" class="form-control" placeholder="Email">
                        @if($errors->has('email'))
                            <div class="text-danger">
                                    {{$errors->first('email')}}
                            </div>
                        @endif
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="text" name="password" class="form-control" placeholder="password">
                        @if($errors->has('password'))
                            <div class="text-danger">
                                    {{$errors->first('password')}}
                            </div>
                        @endif
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox" name="remember" class="mr-2">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>




<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!------ Include the above for js ---------->
</body>
</html>