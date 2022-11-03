
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
						<form action="{{url('proupdate/'.$findrec[0]->id)}}" method="post" enctype="multipart/form-data ">
							@endisset
							<form action="{{url('prosubmit')}}" method="post" enctype="multipart/form-data">>
								{{csrf_field()}}
								<tr>
									<td>
										<div class="addyserinfo">Category Name<span style="color: red">*</span></div>
										<select class="form-control m-bot15" name="cname">
											@foreach($data as $row)
											<option value="{{isset($findrec[0])?$row->cname:$row->cname}}" name="cname">{{isset($findrec[0])?$row->cname:$row->cname}}</option>
											@endForeach

										</select>
									</td>
								</tr>
								<tr>
									<td>
										<div class="addyserinfo">Product Name<span style="color: red">*</span></div>
										<input type="text" name="name" value="{{isset($findrec[0]->name) ? $findrec[0]->name :'' }}">
									</td>
								</tr>
								<tr>
									<td>
										<div class="addyserinfo">Product Price</div>
										<input type="text" name="price" value="{{isset($findrec[0]->price) ? $findrec[0]->price :'' }}">
									</td>
								</tr>
								<tr>
									<td>
										<div class="addyserinfo">Product Description</div>
										<input type="text" name="description" value="{{isset($findrec[0]->description) ? $findrec[0]->description :'' }}">
									</td>
								</tr>
								<tr>
									<td>
										<div class="addyserinfo">Product Image</div>
										<input type="file" name="pimage" value="{{isset($findrec[0]->image) ? $findrec[0]->image :'' }}">
									</td>
								</tr>

							</td>
						</tr>
						<tr>
							<td>
								<div class="addyserinfo"></div>
								<input type="submit" name="save" class="tabbtn" value="Save">
								<input type="button" class="tabbtn" value="Cancel">
							</td>
						</form>
					</table>
				

				</tr>
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

