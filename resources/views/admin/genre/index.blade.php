@extends('layouts.admin_layout')

@section('title', 'Поджанры')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Поджанры</h1>
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
                            Название поджанра
                        </th>
                        <th>
                            Основной жанр
                        </th>
                        <th style="width: 40%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($genres as $genre)
                        <tr>
                            <td>
                                <a>
                                    {{ $genre->id }}
                                </a>
                            </td>
                            <td>
                                <a>
                                    {{ $genre->name }}
                                </a>
                                <br>
                                <small>
                                    {{ $genre->created_at }}
                                </small>
                            </td>
                            <td>
                                {{ $genre->group->name }}
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('genre.show', $genre->id) }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Подробнее
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('genre.edit', $genre->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Редактировать
                                </a>
                                <form style="display: inline-block" action="{{ route('genre.destroy', $genre->id) }}" method="POST">
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
