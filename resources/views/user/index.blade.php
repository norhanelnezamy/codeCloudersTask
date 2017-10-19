@extends('layout')
@section('content')
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Users Table</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Current Users Data
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                              <th>Full Name</th>
                              <th>E-mail</th>
                              <th>Nationality</th>
                              <th>Birthday</th>
                              <th>Gender</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $key => $user)
                          <tr class="odd gradeX">
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->nationality}}</td>
                            <td>{{$user->birthday}}</td>
                            <td><?php echo ($user->gender == 0) ? 'Male' : 'Female' ;?></td>
                            <td>
                              <form action="{{ URL('user/'. $user->id.'/edit') }}" method="get"style="Display:inline-block;">
                                <button class="fa fa-pencil edit_btn"></button>
                              </form>
                              <form action="{{ URL('user/'. $user->id ) }}" method="post"style="Display:inline-block;">
                                {{ csrf_field() }}
                                {{ method_field("DELETE") }}
                                <button class="fa fa-remove remov_btn"></button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                  <!-- /.table-responsi ve -->
                  {{$users->links()}}
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
@endsection
