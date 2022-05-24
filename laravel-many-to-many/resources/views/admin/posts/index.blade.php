@extends('layouts.admin')

@section('pageTitle', 'Posts Listing')

@section('pageMain')

<div class="container">
    @if (session('deleted'))
        <div class="alert alert-warning">{{ session('deleted') }}</div>
    @endif
    <div class="row mb-5">
        <div class="col">


            <p class="fs-1" style="color: rgb(112, 227, 112)">Filter your search:</p>
            <form action="" method="get" class="row g-3 mb-5">

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="author" id="author">
                        <option value="" selected>SELECT AN AUTHOR</option>

                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if($user->id == $request->author) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                    <div class="col-md-6">
                        <select class="form-select" aria-label="Default select example" name="category" id="category">
                            <option value="" selected>CHOOSE A CATEGORY</option>
        
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id == $request->category) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="What are you looking for?" id="search-string" name="s" value="{{ $request->s }}">
                    </div>
        
                    <div class="col-md-10">
                        <button class="btn btn-success fw-bold">APPLY FILTER</button>
                    </div>
            </form>






            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Title</th>
                    <th class="text-center" scope="col">Slug</th>
                    <th class="text-center" scope="col">Author</th>
                    <th class="text-center" scope="col">Category</th>
                    <th class="text-center" scope="col">Tags</th>
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
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->category ->name}}</td>
                            <td class="text-center" >{{ $post->tags->pluck('name')->join(', ') }}</td>
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