@if ($errors->any())
    <h5>{{ $errors->first() }}</h5>
@endif
@if (session()->has('msg'))
    <h5>{{ session()->get('msg') }}</h5>
@endif
@if (session()->has('session'))	
<!DOCTYPE html>
<html>
<head>
	<title>Add Page</title>
	@extends('layouts.app')
</head>
<body>
	<?php include 'conn/header.blade.php' ?>
	<!-- nav container ends -->
	<!-- contentinner container start-->
	<div class="contentinnercontainer">
		<?php include 'conn/sidebar.blade.php' ?>
		<div class="right">
			<h3 class="imp">Page Manager</h3>
			<hr size="1" >
			<p>This Section displays the list of pages</p>
			<table class="maintable" >
				<tr>
					<td class="chtcnp">
						<a href="#">click here </a>
						<span>To Create</span>
						<a href="#"> new page</a>
					</td>
				</tr>
			</table>
			<!-- second table starts here  -->
			<table class="ineertable">
				<form action="{{url('searchpage')}}" method="post">
					{{csrf_field()}}
					<tr><td>Search</td></tr>
					<tr><td>Search By Page Name : <input type="text" name="name">
						<span><input type="submit" name="" value="Search" class="searchbtn"></span>
					</td>
				</tr>
			</form>

		</table>
<!-- 			<p>Page 1 of 2 showing 10 records of 13 records, starting on record 1,ending on 10</p>
-->			<!-- third table starts here  -->
<table class="datatable">
	<tr>
		<th>Id</th>
		<th>Page Name</th>
		<th>Page Content</th>
		<th>Status</th>
		<th>Delete</th>
		<th>Edit</th>
	</tr>
	@isset($data)
	@foreach($data as $row)
	<tr>
		<td>{{$row->id}}</td>
		<td>{{$row->name}}</td>
		<td>{{$row->content}}</td>
		<td class="red">{{$row->status}}</td>
		<td><a href="{{'pagedelete/'.$row->id}}">Delete</td>
			<td><a href="{{'pageedit/'.$row->id}}">Edit</td>
			</tr>
			@endforeach
			@endisset
			<!-- <tr> -->
				<!-- 	<td colspan="6">
						<div class="Preview" style="">
							<span><< Preview</span>|1|2 next >>
						</div>
						<div class="dltbtn">
							<button class="deletebtn">Delete</button>
						</div>
					</td>
				</tr> -->
			</table>
			
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
@else
<h5>Please Login
</h5>
<a href="login">Login</a>
    @endif



