@extends('layouts.admin_layout')

@section('title', 'Редактирование музыканта')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование музаканта</h1>
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
                <form action="{{ route('musician.update', $musician->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-header">
                        <h3 class="card-title">Форма редактирования</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputBorder">Наименование музыканта</label>
                            <input name="name" type="text" value="{{ $musician->name }}" class="form-control form-control-border" id="exampleInputBorder" placeholder="Введите">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Описание</label>
                            <input name="description" type="text" value="{{ $musician->description }}" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Введите">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectBorder">Принадлежность к жанрам</label>
                            <div class="form-check" style="display: block">
                                @foreach($groups as $group)
                                    @if(in_array($group->name, $actualGroupsNames))
                                        <input style="display: block" name="groups[]" value="{{ $group->id }}" class="form-check-input" type="checkbox" checked>
                                        <label style="display: block" class="form-check-label">{{ $group->name }}</label>
                                    @else
                                        <input style="display: block" name="groups[]" value="{{ $group->id }}" class="form-check-input" type="checkbox">
                                        <label style="display: block" class="form-check-label">{{ $group->name }}</label>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="feature_image">Фото</label>
                            <img src="{{ $musician->img }}" alt="" class="img-uploaded" style="display: block; width: 150px">
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
