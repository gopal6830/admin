@if($errors->any())
	<h4>{{$errors->first()}}</h4>
@endif
@if (session()->has('msg'))
    <h4>{{ session()->get('msg') }}</h4>
@endif
@if (session()->has('session'))
    <?php
    session()->flush();
    ?>
@endif
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<!-- inner container start-->
	<div class="innercontainer">
		<img src="img/logo.png" >
	</div>
	<!-- inner container ends -->
	<!-- nav container start-->
	<div class="navcontainer">
		<!-- navinner container start-->
		<div class="navinnercontainer">
			<h4>Friday, 8th july 2012</h4>
		</div>
		<!-- nav inner container ends -->
	</div>
	<!-- nav container ends -->

	<!-- contentinner container start-->
	<div class="contentinnercontainer">
		<div class="form">
			 <form action="login" method="POST">
				{{csrf_field()}}
				<h1 class="login">Login</h1>
				Username<input type="text" name="username"><br>
				<!-- @if ($errors->has('username'))
				<span class="text-danger">{{ $errors->first('username') }}</span>
				@endif -->
				Password<input type="text" name="password"><br>
				<!-- @if ($errors->has('password'))
				<span class="text-danger">{{ $errors->first('password') }}</span>
				@endif -->
				<!-- <a href="pagemanager"><input type="button" value="login" class="loginbtn"></a> -->
				<input type="submit" value="login" class="loginbtn">
			</form>
		</div>
	</div>
	<!-- content inner container ends -->

	<!-- footer container start-->
	<div class="footer">
		<!-- footerinner container start-->
		<div class="footerinnercontainer">

		</div>
		<!-- footer inner container ends -->
	</div>
	<!-- footer container ends -->
</body>
</html>
