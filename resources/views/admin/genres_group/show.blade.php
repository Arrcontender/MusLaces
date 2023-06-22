@extends('layouts.admin_layout')

@section('title', $genresGroup->name)

@section('content')

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3>{{ $genresGroup->name }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Средний темп</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ $genresGroup->bpm }} BPM</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Количество поджанров</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ $genresGroup->genres->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Количество заинтересованных мест</span>
                                    <span class="info-box-number text-center text-muted mb-0">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Поджанры</h4>
                            <div class="post">
                                @foreach($genres as $genre)
                                <div>
                                    <span class="username">
                                        <a href="{{ route('genre.show', $genre->id) }}">{{ $genre->name }}</a>
                                    </span>
                                </div>

                                <p>
                                    {{ $genre->description }}
                                </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary">Описание</h3>
                    <p class="text-muted">{{ $genresGroup->description }}</p>
                    <br>
                    <div class="text-center mt-5 mb-3">
                        <a href="{{ route('genres_group.edit', $genresGroup->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
                        <form style="display: inline-block" action="{{ route('genres_group.destroy', $genresGroup->id) }}" method="POST">
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
