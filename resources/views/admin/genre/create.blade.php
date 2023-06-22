@extends('layouts.admin_layout')

@section('title', 'Создание поджанра')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание поджанра</h1>
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
                <form action="{{ route('genre.store') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Форма создания</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputBorder">Наименование поджанра</label>
                            <input type="text" name="name" class="form-control form-control-border" id="exampleInputBorder" placeholder="Введите">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Описание</label>
                            <textarea type="text" name="description" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Введите"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectBorder">Основной жанр</label>
                            <select name="group" class="custom-select form-control-border" id="exampleSelectBorder">
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
