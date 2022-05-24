@extends('layouts.admin')

@section('pageTitle', 'Posts Listing')

@section('pageMain')

<div class="container">
    @if (session('deleted'))
        <div class="alert alert-warning">{{ session('deleted') }}</div>
    @endif
    <div class="row mb-5">
        <div class="col">

            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Title</th>
                    <th class="text-center" scope="col">Slug</th>
                    <th class="text-center" scope="col">Created At</th>
                    <th class="text-center" scope="col">Updated At</th>
                    <th class="text-center" scope="col" colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th class="text-center" scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ date('d/m/Y', strtotime($post->created_at)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($post->updated_at)) }}</td>
                            <td>
                                <!--VIEW -->
                                <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }}">View</a>
                            </td>
                            <td>
                                <!--EDIT -->
                                @if (Auth::user()->id === $post->user_id)
                                <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->slug) }}">Edit</a>
                                @endif

                            </td>
                            <td class="text-center">
                                <!--DELETE -->
                                @if (Auth::user()->id === $post->user_id)
                                <button class="btn btn-danger btn-delete" data-id="{{ $post->slug }}">Delete</button>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $posts->links() }}

    <section id="delete-confirm" class="d-none">
        <div class="pop-up">
            <h3>Sei sicuro di voler eliminare?</h3>
            <div class="d-flex justify-content-center">
                <button id="btn-no" class="btn btn-success me-3">NO</button>
                <form method="POST" data-base="{{ route('admin.posts.index') }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">SI</button>
                </form>
            </div>
        </div>
    </section>



@endsection