@extends('layouts.app')

@section('content')
    <div class="container pt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                {!! Form::open(['route'=>'posts.index','method'=>'GET', 'class'=> 'form-inline']) !!}
                    {{ Form::search('search',$frd['search'] ?? old('search') ?? null,[
                        'data-source'=>'/', //route('posts.autocomplete')
                        'aria-label'=>'Recipients postname',
                        'aria-describedby'=>'posts__search',
                        'placeholder'=>"Поиск...",
                        'class'=>'form-control grow-1 js-autocomplete js-on-change-submit mr-2 mb-2',
                    ]) }}
                    <div class="btn-group mr-2 mb-2" role="group">
                        <a class="btn btn-outline-secondary " href="{{ route('posts.index') }}"
                           title="Очистить форму">Очистить</a>
                    </div>
                    <button class="btn btn-primary mb-2" type="submit">Вперед!</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="container pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="list-group">
                    @forelse ($posts as $post)
                        <a href="{{ route('posts.show', $post) }}" class="list-group-item list-group-item-action">{{ $post->name }}</a>
                    @empty
                        <p>No posts</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {{ $posts->links() }}
@endsection
