@extends('admin.layouts.main') <!-- путь к файлу -->

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex ">
            <h1 class="m-0 mr-3 ">{{ $user->name }}</h1>
            <a href="{{ route('admin.user.edit' , $user->id) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
            <form action="{{ route('admin.user.delete' , $user->id)}}" method="POST">    <!--  удаление user -->
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 bg-transparent ">
                                  <i class="fas fa-trash text-danger " role="button"></i>
                                </button>
                              </form>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Small boxes (Stat box) -->
    
        <div class="row">
          <div class="col-7">
          <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <tbody>   
                          <tr>
                            <td>ID</td>
                            <td>Имя</td>
                          </tr>
                          <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                          </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  @endsection