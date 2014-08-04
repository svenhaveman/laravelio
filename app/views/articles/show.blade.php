@extends('layouts._two_columns_left_sidebar')

@section('sidebar')
    @include('articles._sidebar')
@stop

@section('content')
    <div class="header">
        <h1>Article</h1>
    </div>

    <article>
        <h2>{{ $article->title }}</h2>

        {{ $article->content }}

        <div class="user">
            {{ $article->author->thumbnail }}
            <div class="info">
                <h6><a href="{{ $article->author->profileUrl }}">{{ $article->author->name }}</a></h6>
                <ul class="meta">
                    <li>{{ $article->published_ago }}</li>
                </ul>
            </div>
        </div>

        @if($article->isManageableBy($currentUser))
            <div class="admin-bar">
                <li><a class="button" href="{{ $article->updateUrl }}">Edit</a></li>
                <li><a class="button" href="{{ $article->deleteUrl }}">Delete</a></li>
            </div>
        @endif
    </article>
@stop

@section('scripts')
    @parent
    <script src="{{ asset('javascripts/vendor/tabby.js') }}"></script>
    <link rel="stylesheet" href="http://yandex.st/highlightjs/7.5/styles/obsidian.min.css">
    <script src="http://yandex.st/highlightjs/7.5/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@stop
