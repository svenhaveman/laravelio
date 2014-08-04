@extends('layouts._two_columns_left_sidebar')

@section('sidebar')
    @include('forum._sidebar')
@stop

@section('content')
<div class="header">
    <h1>Edit Your Reply</h1>
</div>

    <div class="reply-form">
        {{ Form::model($reply->resource) }}
            <div class="form-row">
                <label class="field-title">Reply</label>
                {{ Form::textarea("body", null, ['class' => '_tab_indent']) }}
                {{ $errors->first('body', '<small class="error">:message</small>') }}
                <small>Paste a <a href="https://gist.github.com" target="_NEW">Gist</a> URL to embed source. <em>example: https://gist.github.com/username/1234</em></small>
            </div>

            <div class="form-row">
                {{ Form::button('Reply', ['type' => 'submit', 'class' => 'button']) }}
            </div>
    </div>
@stop

{{-- “What do you think you are, for Chrissake, crazy or somethin'? Well you're not! You're not! You're no crazier than the average asshole out walkin' around on the streets and that's it. ”  --}}