@extends('layouts.admin_layout')

@section('title', $user->name)

@section('content')

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3>{{ $user->name }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <img src="{{ $user->img }}" alt="" style="display: block; width: 150px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4>{{ $user->email }}</h4>
                                <div class="post">
                                    <table class="table table-striped projects">
                                        <thead> <h5>Оценка мест</h5>
                                        <tr>
                                            <th style="width: 1%">
                                                ID
                                            </th>
                                            <th style="width: 20%">
                                                Локация
                                            </th>
                                            <th>
                                                Фото
                                            </th>
                                            <th>
                                                Оценка звука
                                            </th>
                                            <th>
                                                Оценка атмосферы
                                            </th>
                                            <th>
                                                Оценка алкоголя
                                            </th>
                                            <th>
                                                Оценка чистоты
                                            </th>
                                            <th>
                                                Оценка цена/качество
                                            </th>
                                            <th>
                                                Общая оценка
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
                                                    <span class="info-box-number text-center text-muted mb-0">
                                                        <a href="{{ route('place.show', $place->id) }}">{{ $place->name }}</a>
                                                    </span>
                                                    <br>
                                                    <small>
                                                        {{ $place->created_at }}
                                                    </small>
                                                </td>
                                                <td>
                                                    <img alt="Avatar" class="table-avatar" src={{ $place->img }}>
                                                </td>
                                                <td>
                                                    <a>
                                                        {{ $place->pivot->music }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a>
                                                        {{ $place->pivot->vibe }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a>
                                                        {{ $place->pivot->drinks }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a>
                                                        {{ $place->pivot->cleanness }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a>
                                                        {{ $place->pivot->price }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a>
                                                        {{ ($place->pivot->price + $place->pivot->cleanness + $place->pivot->drinks +
                                                            $place->pivot->vibe + $place->pivot->music) / 5 }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <div class="text-center mt-5 mb-3">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
                            <form style="display: inline-block" action="{{ route('user.destroy', $user->id) }}" method="POST">
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
