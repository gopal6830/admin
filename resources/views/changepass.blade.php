
    <!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <form action="{{url('changepass')}}" method="POST">
                        @csrf
                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Old Password</label>
                                <input name="ol" type="password" class="form-control" 
                                id="oldPasswordInput"
                                    placeholder="Old Password">
                               
                                    <span class="text-danger"></span>
                               
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">New Password</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                               
                                    <span class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
 -->
@if($errors->any())
    <h4>{{$errors->first()}}</h4>
@endif
    <html>
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
        </div>
        <aside>
            <div class="container ">
                </div>
                <div>
                    <!--font: font-style font-variant font-weight font-size/line-height font-family -->
                    <div>
                        Change password</div>
                       @if (!empty($id))
                        <form method="post" action="{{ url('newpass') }}">
                            {{ csrf_field() }}
                            <table border="1" width="100%" style="text-align: center;">
                                <tr>
                                    <td style="padding:8px;">
                                        Enter new password
                                        <input type="hidden" name="id" value="{{ $id }}" />
                                        <input type="text" name="newpass" />
                                        <input type="submit" value="newpassword" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    @else
                        <form method="post" action="{{ url('oldpass') }}">
                            {{ csrf_field() }}
                            <table border="1" width="100%" style="text-align: center;">
                                <tr>
                                    <td style="padding:8px;">
                                        Enter old password
                                        <input type="text" name="oldpass" />
                                        <input type="submit" value="Enter" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                        @endif
                  
                </div>

    </body>

    </html>
