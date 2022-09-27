@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-secondary table-hover">
                    <thead class="table-success">
                        <th>ID</th>
                        <th>Titolo</th>
                        <th>Autore</th>
                        <th>Data</th>
                        <th>Tags</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->post_date }}</td>
                                <td>
                                    @if (isset($post->tags))
                                        @foreach ($post->tags as $tag)
                                            #{{ $tag->name }}
                                        @endforeach
                                    @else
                                        Non sono stati selezionati tag per questo post
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.posts.show', $post->id) }}">
                                        <button class="btn btn-sm btn-primary text-light font-weight-bold">Show</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.posts.edit', $post->id) }}">
                                        <button class="btn btn-sm btn-success text-light font-weight-bold">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="">
                                            <button class="btn btn-sm btn-danger font-weight-bold">Delete</button>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr colspan=10>
                                <td>Non sono stati trovati posts da visualizzare</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
