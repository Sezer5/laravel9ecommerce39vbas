  <!-- resources/views/child.blade.php -->

  @extends('layouts.adminbase')

  @section('title', 'Edit Question :'.$data->question)

  @section('content')
      <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
  <!-- Right side column. Contains the navbar and content of the page -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Edit {{$data->Question}}
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
                      <form role="form" action="{{route('admin.faq.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="box-body">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Question</label>
                                  <input type="text" name="question" class="form-control" value="{{$data->question}}">
                              </div>
                              <div class="form-group">
                                  <textarea name="answer" id="detail" cols="30" rows="10">{{$data->answer}}</textarea>
                                  <script>
                                      ClassicEditor
                                          .create( document.querySelector( '#detail' ) )
                                          .then( editor => {
                                              console.log( editor );
                                          } )
                                          .catch( error => {
                                              console.error( error );
                                          } );
                                  </script>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Status</label>
                                  <select name="status" class="form-control">
                                      <option selected>{{$data->status}}</option>
                                      <option value="True">True</option>
                                      <option value="False">False</option>
                                  </select>
                              </div>
                          </div><!-- /.box-body -->

                          <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                      </form>
                  </div><!-- /.box -->
              </div>
          </div>

      </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  @endsection
