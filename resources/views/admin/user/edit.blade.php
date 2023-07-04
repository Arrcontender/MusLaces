@extends('layouts.admin_layout')

@section('title', 'Редактирование пользователя')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователя</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-header">
                        <h3 class="card-title">Форма редактирования</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputBorder">Имя пользователя</label>
                            <input name="name" type="text" value="{{ $user->name }}" class="form-control form-control-border" id="exampleInputBorder" placeholder="Введите">
                        </div>
                        <div class="form-group">
                            <label for="feature_image">Фото</label>
                            <img src="{{ $user->img }}" alt="" class="img-uploaded" style="display: block; width: 150px">
                            <input class="form-control" type="text" id="feature_image" name="img" value="" hidden>
                            <a href="" class="popup_selector" data-inputid="feature_image">Select Image</a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
