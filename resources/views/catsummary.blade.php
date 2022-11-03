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
    <div class="contentinnercontainer">
        <?php include 'conn/sidebar.blade.php' ?>
        <div class="right">
            <h3 class="imp">Category Summary</h3>
            <hr size="1" >
            <!-- second table starts here  -->
            <table class="ineertable">
               <form action="{{url('searchcat')}}" method="post">
                    {{csrf_field()}}
                    <tr><td>Search</td></tr>
                    <tr><td>Search By Page Name : <input type="text" name="namess">
                        <span><input type="submit" name="" value="Search" class="searchbtn"></span>
                    </td>
                </tr>
            </form>
            </table>
            <table class="datatable">
                <tr>
                    <th>Id</th>
                    <th>Categroy Name</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                @foreach($data as $row)
                 <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->cname}}</td>
                    <td><a href="{{'catdelete/'.$row->id}}">Delete</td>
                    <td><a href="{{'catedit/'.$row->id}}">Edit</td>
                </tr>
                @endforeach
            </table>
            
        </div>
    </div>
    <div class="footer">
        <div class="footerinnercontainer">
        </div>
    </div>
</body>
</html>
@else
 <body>
        <h4>Please Login</h4>
        <a href="login">login</a>
    </body>
    @endif

