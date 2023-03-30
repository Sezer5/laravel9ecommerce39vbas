  <!-- resources/views/child.blade.php -->

  @extends('layouts.adminbase')

  @section('title', 'Message List')

  @section('content')

  <!-- Right side column. Contains the navbar and content of the page -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              User List
          </h1>
          <ol class="breadcrumb">
              <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Examples</a></li>
              <li class="active">Blank page</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="row">

                  <div class="col-md-12">
                      <div class="box">
                          <table class="table table-striped table-bordered">
                              <tbody>
                                  <tr>
                                      <th style="width: 10px">Id</th>
                                      <th>Name</th>
                                      <th>E-mail</th>
                                      <th>Password</th>
                                      <th>Role</th>
                                      <th>Delete</th>
                                      <th>Show</th>
                                  </tr>
                                  @foreach($data as $rs)
                                  <tr>
                                      <td>{{$rs->id}}</td>
                                      <td>{{$rs->name}}</td>
                                      <td>{{$rs->email}}</td>
                                      <td>{{$rs->password}}</td>
                                      <td>
                                            @foreach($rs->roles as $role)
                                                {{$role->name}}
                                          @endforeach
                                      </td>
                                      <td><a href="{{route('admin.user.destroy',['id'=>$rs->id])}}">Delete</a></td>
                                      <td><a href="{{route('admin.user.show',['id'=>$rs->id])}}">Show</a></td>


                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div><!-- /.box -->
                  </div>
              </div><!-- /.box-body -->
      </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  @endsection
