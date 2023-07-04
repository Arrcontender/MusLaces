@extends('layouts.admin_layout')

@section('title', 'Пользователи')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователи</h1>
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
                            Имя пользователя
                        </th>
                        <th>
                            Оцененные места
                        </th>
                        <th>
                            Фото
                        </th>
                        <th style="width: 40%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <a>
                                    {{ $user->id }}
                                </a>
                            </td>
                            <td>
                                <a>
                                    {{ $user->name }}
                                </a>
                                <br>
                                <small>
                                    {{ $user->created_at }}
                                </small>
                            </td>
                            <td>
                                <a>
                                    {{ $user->places->count() }}
                                </a>
                            </td>
                            <td>
                                <img alt="Avatar" class="table-avatar" src={{ $user->img ?? null }}>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('user.show', $user->id) }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Подробнее
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('user.edit', $user->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Редактировать
                                </a>
                                <form style="display: inline-block" action="{{ route('user.destroy', $user->id) }}" method="POST">
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
