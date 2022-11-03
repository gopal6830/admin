@if ($errors->any())
    <h5>{{ $errors->first() }}</h5>
@endif
@if (session()->has('msg'))
    <h5>{{ session()->get('msg') }}</h4>
@endif
@if (session()->has('session'))	
<html>
<head>
	<title>Add Page</title>
	@extends('layouts.app')
</head>
<body>
	<?php include 'conn/header.blade.php' ?>
<!-- nav container ends -->

<!-- content container start-->
<div class="contentcontainer3">
	<!-- contentinner container start-->
<div class="contentinnercontainer2">
	<?php include 'conn/sidebar.blade.php' ?>
	<div class="right">
	<h3 class="imp">Page Manager</h3>
	<hr size="1" >
	<table class="addpagetable">
		<tr>
			<th>Add Category</th>
		</tr>
		 @isset($findrec[0]->id)
   <form action="{{url('edit-cat/'.$findrec[0]->id)}}" method="post">
   	@endisset
		<form action="{{url('catsubmit')}}" method="post">
			{{csrf_field()}}
		<tr>
			<td>	
				<table class="addpagedata">
					<tr>
						<td>
							<div class="addyserinfo">Category Name</div>
							<input type="text" name="cname" value="{{isset($findrec[0]->cname) ? $findrec[0]->cname :'' }}">
						 </td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<div class="addyserinfo"></div>
				<input type="submit" class="tabbtn" name="save" value="Save">
				<input type="button" class="tabbtn" value="Cancel">
			</td>
		</tr>
	</form>
	</table>
	</div>
</div>
	<!-- content inner container ends -->
</div>
<!-- content container ends -->

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
@else
 <body>
        <h4>Please Login</h4>
        <a href="login">login</a>
    </body>
    @endif
