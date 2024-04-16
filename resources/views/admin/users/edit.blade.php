@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Home</a></li>
                            <li class="breadcrumb-item ">Пользователи</li>
                            <li class="breadcrumb-item active">Редактирование пользователя</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <a href="{{ route('admin.users.index') }}" class="btn btn-block btn-secondary btn-lg col-1 mb-3" >Назад</a>
            <div class="card card-primary col-6">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Имя пользователя</label>
                            <input name="name" value="{{ $user->name }}" type="text" class="form-control" id="exampleInputPassword1" placeholder="Введите имя пользователя">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Адрес электронной почты</label>
                            <input name="email" value="{{ $user->email }}" type="email" class="form-control" id="exampleInputEmail1" placeholder="Введите адрес электронной почты">
                        </div>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Выберите роль</label>
                            <select name="role" class="custom-select">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}" {{ $id == $user->role ? ' selected' : ''}}>
                                        {{ $role }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </div>

                </form>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
