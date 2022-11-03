@if ($errors->any())
    <h5>{{ $errors->first() }}</h5>
@endif
@if (session()->has('msg'))
    <h5>{{ session()->get('msg') }}</h5>
@endif
@if (session()->has('session'))	
<html>
<head>
	<title>Add Page</title>
	@extends('layouts.app')
</head>
<body>
	<?php include 'conn/header.blade.php' ?>
	<!-- inner container start-->
	
	<!-- nav container ends -->

	<!-- content container start-->
	<div class="contentcontainer3">
		<!-- contentinner container start-->
		<div class="contentinnercontainer2">
			<?php include 'conn/sidebar.blade.php' ?>
			<div class="right">
				<h3 class="imp">Page Manager</h3>
				<hr size="1">
				<table class="addpagetable">
					<tr>
						<th>Add Page</th>
					</tr>
					<tr>
						<td>	
							<table class="addpagedata">
					<!-- <tr>
						<td>
							<div class="addyserinfo">parent page</div>
							<select placeholder="<Select Option>">
								<option > ROOT* </option>
							</select>								 
						 </td>
						</tr> -->
						@isset($findrec[0]->id)
						<form action="{{url('edit-form/'.$findrec[0]->id)}}" method="post">
							@endisset
						<form action="{{url('pagesubmit')}}" method="post">
						{{csrf_field()}}
						<tr>
							<td>
								<div class="addyserinfo">Name<span style="color: red">*</span></div>
								<input type="text" name="name"  value="{{isset($findrec[0]->name) ? $findrec[0]->name :'' }}">
							</td>
						</tr>
						<tr>
							<td>
								<div class="addyserinfo addyserinfo3"> Content</div>
								<div class="content">
									<!-- <img src="img/table.jpeg" width="580px;" > -->
									<input type="text" name="content" value="{{isset($findrec[0]->content) ? $findrec[0]->content :'' }}">
								</div>
							</td>
						</tr>
						<tr>
							<td class="displaystatus">
								<div class="addyserinfo">Status</div>
								<input type="checkbox" name="status" value="{{isset($findrec[0]->status) ? $findrec[0]->status :'' }}">
								<!-- @if($findrec['status']=1)
								<input type="checkbox" name="status" checked>
								@else
								<input type="checkbox" name="status">
								@endif -->

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

