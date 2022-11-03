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
            <h3 class="imp">Product Manager</h3>
            <hr size="1" >
            <!-- second table starts here  -->
           <table class="ineertable">
               <form action="{{url('searchpro')}}" method="post">
                    {{csrf_field()}}
                    <tr><td>Search</td></tr>
                    <tr><td>Search By Page Name : <input type="text" name="name">
                        <span><input type="submit" name="" value="Search" class="searchbtn"></span>
                    </td>
                </tr>
            </form>
            </table>
            <table class="datatable">
                <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Description</th>
                    <th>Product Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @isset($data)
                @foreach($data as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->cname}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->price}}</td>
                     <td>{{$row->description}}</td>
                    <td class="red"><img src="{{ asset('upload_image/'.$row->image) }}" width="100px" /></td>
                    <td><a href="{{'prodelete/'.$row->id}}">Delete</td>
                    <td><a href="{{'prodedit/'.$row->id}}">Edit</td>
                </tr>

                @endforeach
                @endisset
               <!--  <tr>
                    <td colspan="6">
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
 <body>
        <h4>Please Login</h4>
        <a href="login">login</a>
    </body>
    @endif

