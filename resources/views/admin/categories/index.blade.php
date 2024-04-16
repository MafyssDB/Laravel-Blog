@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Категории</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-block btn-secondary btn-lg col-1 mb-3" >Создать</a>
        <div class="card   col-5">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название категории</th>
                        <th colspan="3">Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td><a href="{{ route('admin.categories.show', $category->id) }}"><i class="fas fa-eye" style="color: #0f56d2;"></i></a></td>
                        <td><a href="{{ route('admin.categories.edit', $category->id) }}"><i class="fas fa-pencil-alt" style="color: #0ac749;"></i></a></td>
                        <td>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                               <button type="submit" class="border-0 bg-transparent">
                                   <i class="fas fa-trash" style="color: #d41508;"></i>
                               </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
