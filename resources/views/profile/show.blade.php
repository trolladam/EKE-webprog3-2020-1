@extends('_layout.master')

@section('content')
    <h1>{{ $user->fullname }}</h1>
    @include('posts._list', ['posts' => $posts])
@endsection
