@extends('layouts.app')

@section('content')
    <div class="container pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post->getName() }}</div>

                    <div class="card-body">
                        <p>{{ $post->getContent() }}</p>
                        <p class="h5">Автор</p>
                        <p>{{ $post->getUserName() }}</p>
                        <br>
                        <a class="btn btn-primary" href="{{ route('posts.edit', $post) }}">Редактировать</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
