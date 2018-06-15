@extends('layouts.app')

@section('content')

    <div class="container pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post->getName() }}</div>

                    <div class="card-body">
                        {!! Form::model($post, ['route' => ['posts.update', $post], 'method' => 'PATCH', 'class' => 'js-ajax']) !!}
                        @include('posts._form')
                        <div class="form-group mb-0">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-success" onclick="return confirm(&quot;Подтвердите сохранение?&quot;)">
                                    Сохранить
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="card-body">
                        {!! Form::model($post, ['route' => ['users.destroy', $post], 'method' => 'DELETE', 'class' => 'js-ajax']) !!}
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Удалить
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
