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
                    @error('title')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="slug" class="form-label fw-bold" style="color: rgb(255, 119, 0)">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug }}" {{ old('slug', $post->slug) }}>
                    </div>
                    @error('slug')
                    <div class="alert alert-warning">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold" style="color: rgb(255, 119, 0)">Content</label>
                        <input type="text" class="form-control" id="content" name="content" value="{{ $post->content }}" {{ old('content', $post->content) }}>
                    </div>
                    @error('content')
                    <div class="alert alert-warning">{{ $message }}</div>
                    @enderror

                    <div style="color: rgb(255, 119, 0)" class="fw-bold">Category:</div>
                    <select class="form-select" aria-label="Default select example" name="category_id" id="category">
                        <option value="">Select a category</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if ($category->id == old('category_id', $post->category->id)) selected @endif>
                                    {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <fieldset class="mt-4">
                        <div style="color: rgb(255, 119, 0)" class="fw-bold mb-2">Tags:</div>
                        @foreach ($tags as $tag)
                            <input class="form-check-input" type="checkbox" name="tags[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                                @if (in_array($tag->id, old('tags', $post->tags->pluck('id')->all()))) checked @endif>
                            <label class="form-check-label me-4" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                        @endforeach
                    </fieldset>
                    @error('tags')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror






                    <button type="submit" class="btn btn-primary mt-5 fw-bold">SUBMIT</button>

                </form>

                <a class="btn btn-success mt-2 fw-bold" href="{{ url()->previous() }}" role="button">BACK</a>

            </div>
        </div>
    </div>
@endsection