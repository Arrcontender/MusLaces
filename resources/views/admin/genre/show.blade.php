@extends('layouts.admin_layout')

@section('title', $genre->name)

@section('content')

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3>{{ $genre->name }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Основной жанр</span>
                                        <span class="info-box-number text-center text-muted mb-0"><a href="{{ route('genres_group.show', $group->id) }}">{{ $group->name }}</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4>Описание</h4>
                                <div class="post">
                                    <div>
                                        {{ $genre->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <div class="text-center mt-5 mb-3">
                            <a href="{{ route('genre.edit', $genre->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
                            <form style="display: inline-block" action="{{ route('genre.destroy', $genre->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete-button">
                                    <i class="fas fa-trash">
                                    </i>
                                    Удалить
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
