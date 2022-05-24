@extends('layouts.admin')

@section('pageTitle', 'Edit posts listing')

@section('pageMain')
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('admin.posts.update', $post->slug ) }}">

                    @csrf
                    @method('PUT')


                    <div class="mb-3">
                      <label for="title" class="form-label fw-bold" style="color: rgb(255, 119, 0)">Title</label>
                      <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" {{ old('title', $post->title) }}>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label fw-bold" style="color: rgb(255, 119, 0)">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug }}" {{ old('slug', $post->slug) }}>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold" style="color: rgb(255, 119, 0)">Content</label>
                        <input type="text" class="form-control" id="content" name="content" value="{{ $post->content }}" {{ old('content', $post->content) }}>
                    </div>

                    <div class="mb-3">
                        <label for="created_at" class="form-label fw-bold" style="color: rgb(255, 119, 0)">Created:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $post->created_at }}" {{ old('created_at', $post->created_at) }}>
                    </div>

                    <div class="mb-3">
                        <label for="updated_at" class="form-label fw-bold" style="color: rgb(255, 119, 0)">Updated:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $post->updated_at }}" {{ old('updated_at', $post->updated_at) }}>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4 fw-bold">SUBMIT</button>

                </form>

                <a class="btn btn-success mt-2 fw-bold" href="{{ url()->previous() }}" role="button">BACK</a>

            </div>
        </div>
    </div>
@endsection