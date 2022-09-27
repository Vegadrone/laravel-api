@extends('layouts.app')

@section('title', 'Crea un nuovo Post')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('admin.posts.store') }}" method="POST">
                @csrf
                @include('admin.posts.partials.form')
            </form>
        </div>
    </div>
@endsection
