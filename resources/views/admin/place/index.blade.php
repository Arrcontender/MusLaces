@extends('layouts.admin_layout')

@section('title', 'Площадки')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Площадки</h1>
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
                            Наименование площадки
                        </th>
                        <th>
                            Жанры
                        </th>
                        <th>
                            Фото
                        </th>
                        <th>
                            Средний чек
                        </th>
                        <th style="width: 40%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($places as $place)
                        <tr>
                            <td>
                                <a>
                                    {{ $place->id }}
                                </a>
                            </td>
                            <td>
                                <a>
                                    {{ $place->name }}
                                </a>
                                <br>
                                <small>
                                    {{ $place->created_at }}
                                </small>
                            </td>
                            <td>
                                @foreach($place->genreGroups as $group)
                                    <a>
                                        {{ $group->name }}
                                    </a>
                                @endforeach
                            </td>
                            @if($place->img)
                                <td>
                                    <img alt="Avatar" class="table-avatar" src={{ $place->img }}>
                                </td>
                            @else
                                <td>
                                    <img class="table-avatar" src="">
                                </td>
                            @endif
                            <td>
                                <a>
                                    {{ $place->average_check }}
                                </a>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('place.show', $place->id) }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Подробнее
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('place.edit', $place->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Редактировать
                                </a>
                                <form style="display: inline-block" action="{{ route('place.destroy', $place->id) }}" method="POST">
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
