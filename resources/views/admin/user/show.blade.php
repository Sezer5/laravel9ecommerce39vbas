  <!-- resources/views/child.blade.php -->

  @extends('layouts.adminbase')

  @section('title', 'User Detail :'.$data->title)

  @section('content')

  <!-- Right side column. Contains the navbar and content of the page -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Show {{$data->subject}}
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Examples</a></li>
              <li class="active">Blank page</li>
          </ol>
      </section>
      <!-- Main content -->
      <section class="content">

          <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                      <div class="box-header">
                          <h3 class="box-title">Quick Example</h3>
                      </div><!-- /.box-header -->
                      <!-- form start -->
                      <table class="table table-stripped table-bordered">
                          <thead>
                              <tr>
                                  <th>Id</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Roles</th>
                                  <th>Add Role</th>
                                  <th>Send</th>

                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>{{$data->id}}</td>
                                  <td>{{$data->name}}</td>
                                  <td>{{$data->email}}</td>
                                  <td>
                                      @foreach($data->roles as $role)
                                          {{$role->name}}
                                          <a href="{{route('admin.user.destroyrole',['uid'=>$data->id,'rid'=>$role->id])}}">[x]</a>
                                      @endforeach
                                  </td>

                                  <form action="{{route('admin.user.addrole',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                      @csrf
                                  <td>
                                      <select name="role_id">
                                          @foreach($roles as $role)
                                          <option value="{{$role->id}}">{{$role->name}}</option>
                                          @endforeach
                                      </select>
                                  </td>
                                  <td><button type="submit" class="btn btn-success">Send</button></td>
                                  </form>
                              </tr>
                          </tbody>
                      </table>

                  </div><!-- /.box -->
              </div>
          </div>

      </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  @endsection
