@extends('layouts.app')

@section('title', 'Modifica un Post')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.posts.partials.form')
            </form>
        </div>
    </div>
@endsection
