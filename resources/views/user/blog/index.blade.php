@extends('user.layouts.app')
@section('title', __('titles.blogs'))
@section('content')
    @foreach($blogs as $blog)
        {{$blog->title()}}
    @endforeach
@endsection
