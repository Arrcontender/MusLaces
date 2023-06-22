@extends('layouts.admin_layout')

@section('title', 'Жанры')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Жанры</h1>
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
                            Название жанра
                        </th>
                        <th style="width: 30%">
                            Средний темп (BPM)
                        </th>
                        <th>
                            Поджанры
                        </th>
                        <th style="width: 40%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                    <tr>
                        <td>
                            <a>
                                {{ $group->id }}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{ $group->name }}
                            </a>
                            <br>
                            <small>
                                {{ $group->created_at }}
                            </small>
                        </td>
                        <td>
                            <a>
                                {{ $group->bpm }} BPM
                            </a>
                        </td>
                        <td>
                            {{ $group->genres->count() }}
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('genres_group.show', $group->id) }}">
                                <i class="fas fa-folder">
                                </i>
                                Подробнее
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('genres_group.edit', $group->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Редактировать
                            </a>
                            <form style="display: inline-block" action="{{ route('genres_group.destroy', $group->id) }}" method="POST">
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
