  <!-- resources/views/child.blade.php -->

  @extends('layouts.adminbase')

  @section('title', 'Faq Add')
  @section('head')
      <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
  @endsection
  @section('content')

  <!-- Right side column. Contains the navbar and content of the page -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Create Faq
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
                      <form role="form" action="{{route('admin.faq.store')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="box-body">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Question</label>
                                  <input type="text" name="question" class="form-control" placeholder="Enter Question">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Answer</label>

                                  <textarea name="answer" id="detail" cols="30" rows="10"></textarea>
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
                          <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </form>
                  </div><!-- /.box -->
              </div>
          </div>

      </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  @endsection
