@extends('_layout.master')

@section('content')
    <h1>{{ $topic->title }}</h1>
    @include('posts._list', ['posts' => $posts])
@endsection
