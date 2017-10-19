@extends('layout')
@section('content')
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Insert User</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Basic Form Elements
              </div>
              <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-6">
                          <form role="form" method="post" action="{{URL('user')}}">
                            {{csrf_field()}}
                              <div class="form-group">
                                <label>User Full Name</label>
                                  <input class="form-control" placeholder="Name" name="name" type="text" autofocus value="{{old('name')}}">
                                  @if ($errors->has('name'))
                                    <p style="color:red">{{ $errors->first('name') }}</p>
                                  @endif
                              </div>
                              <div class="form-group">
                                  <label>E-mail</label>
                                  <input class="form-control" placeholder="example@example.com" name="email" type="email" autofocus value="{{old('email')}}">
                                  @if ($errors->has('email'))
                                    <p style="color:red">{{ $errors->first('email') }}</p>
                                  @endif
                              </div>
                              <div class="form-group">
                                  <label>Password</label>
                                  <input class="form-control" placeholder="************" name="password" type="password">
                                  @if ($errors->has('password'))
                                    <p style="color:red">{{ $errors->first('password') }}</p>
                                  @endif
                              </div>
                              <div class="form-group">
                                  <label>Nationality</label>
                                  <input class="form-control" placeholder="Egyptian" name="nationality" type="text" value="{{old('nationality')}}">
                                  @if ($errors->has('nationality'))
                                    <p style="color:red">{{ $errors->first('nationality') }}</p>
                                  @endif
                              </div>
                              <div class="form-group">
                                  <label>Birthday</label>
                                  <input class="form-control" placeholder="1999-01-01" name="birthday" type="text" value="{{old('birthday')}}">
                                  @if ($errors->has('birthday'))
                                    <p style="color:red">{{ $errors->first('birthday') }}</p>
                                  @endif
                              </div>

                              <div class="form-group">
                                  <label>Gender</label>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="gender" id="optionsRadios1" value="0">Male
                                      </label>
                                  </div>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" name="gender" id="optionsRadios2" value="1">Female
                                      </label>
                                  </div>
                                  @if ($errors->has('gender'))
                                    <p style="color:red">{{ $errors->first('gender') }}</p>
                                  @endif
                              </div>
                              <button type="submit" class="btn btn-primary">Submit </button>
                              <button type="reset" class="btn btn-default">Reset </button>
                          </form>
                      </div>
                      <!-- /.col-lg-6 (nested) -->

                  </div>
                  <!-- /.row (nested) -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
@endsection
