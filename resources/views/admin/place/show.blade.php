@extends('layouts.admin_layout')

@section('title', $place->name)

@section('content')

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3>{{ $place->name }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <img src="{{ $place->img }}" alt="" style="display: block; width: 150px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h3>Средний чек: {{ $place->average_check }}</h3>
                                </div>
                                <h4>Описание</h4>
                                <div class="post">
                                    <div>
                                        {{ $place->description }}
                                    </div>
                                    <div>
                                        <h5>Жанры:</h5>
                                    </div>
                                    @foreach($groups as $group)
                                        <span class="info-box-number text-center text-muted mb-0">
                                            <a href="{{ route('genres_group.show', $group->id) }}">{{ $group->name }}</a>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <div class="text-center mt-5 mb-3">
                            <a href="{{ route('place.edit', $place->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
                            <form style="display: inline-block" action="{{ route('place.destroy', $place->id) }}" method="POST">
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
