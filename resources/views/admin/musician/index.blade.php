@extends('layouts.admin_layout')

@section('title', 'Музыкант')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Музыканты</h1>
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
    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            ID
                        </th>
                        <th style="width: 20%">
                            Имя музыканта/проекта
                        </th>
                        <th>
                            Жанры
                        </th>
                        <th>
                            Фото
                        </th>
                        <th style="width: 40%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($musicians as $musician)
                        <tr>
                            <td>
                                <a>
                                    {{ $musician->id }}
                                </a>
                            </td>
                            <td>
                                <a>
                                    {{ $musician->name }}
                                </a>
                                <br>
                                <small>
                                    {{ $musician->created_at }}
                                </small>
                            </td>
                            <td>
                                @foreach($musician->genreGroups as $group)
                                    <a>
                                        {{ $group->name }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <img alt="Avatar" class="table-avatar" src={{ $musician->img }}>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('musician.show', $musician->id) }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Подробнее
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('musician.edit', $musician->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Редактировать
                                </a>
                                <form style="display: inline-block" action="{{ route('musician.destroy', $musician->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-button">
                                        <i class="fas fa-trash">
                                        </i>
                                        Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </section>

@endsection
