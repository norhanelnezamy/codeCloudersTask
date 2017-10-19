<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL('dashboard/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{URL('dashboard/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL('dashboard/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL('dashboard/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Register</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="{{URL('register')}}">
                          {{csrf_field()}}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Name" name="name" type="text" autofocus value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                      <p style="color:red">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus value="{{old('email')}}">
                                    @if ($errors->has('email'))
                                      <p style="color:red">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                    @if ($errors->has('password'))
                                      <p style="color:red">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nationality" name="nationality" type="text" value="{{old('nationality')}}">
                                    @if ($errors->has('nationality'))
                                      <p style="color:red">{{ $errors->first('nationality') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                  <input class="form-control" placeholder="Birthday format 1999-01-01" name="birthday" type="text" value="{{old('birthday')}}">
                                  @if ($errors->has('birthday'))
                                    <p style="color:red">{{ $errors->first('birthday') }}</p>
                                  @endif
                                </div>
                                <label class="radio-inline">
                                  <input type="radio" name="gender" value="1">Female
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="gender" value="0">Male
                                </label>
                                @if ($errors->has('gender'))
                                  <p style="color:red">{{ $errors->first('gender') }}</p>
                                @endif
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Register</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{URL('dashboard/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL('dashboard/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{URL('dashboard/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{URL('dashboard/dist/js/sb-admin-2.js')}}"></script>

</body>

</html>
