@extends('layouts.admin')

@section('pageTitle', $pageTitle)

@section('pageMain')
    <div class="container">
        <div class="row g-4">
            <div class="col-8 mt-5">

                <div class="fs-1"> <a class="title-link text-decoration-none" href="{{ route('admin.posts.show', $post->slug) }}">{{ $post->title }}</a> </div>
                <div><h5 class="fw-bold" style="color: rgb(255, 119, 0)">Author:</h5>{{ $post->user->name }}</div>
                <div><h5 class="fw-bold" style="color: rgb(255, 119, 0)">Phone number:</h5>{{ $post->user->userInfo->phone }}</div>

                <div> <h5 class="fw-bold" style="color: rgb(255, 119, 0)">Slug:</h5> {{ $post->slug }} </div>
                <p> <h5 class="fw-bold" style="color: rgb(255, 119, 0)">Content:</h5> {{ $post->content }} </p>
                <div><h5 class="fw-bold" style="color: rgb(255, 119, 0)">Category:</h5> {{ $post->category ->name}}</div>
                <div> <h5 class="fw-bold" style="color: rgb(255, 119, 0)">Created At:</h5> {{ $post->created_at }}</div>
                <div> <h5 class="fw-bold" style="color: rgb(255, 119, 0)">Updated At:</h5> {{ $post->updated_at }}</div>

                <a class="btn btn-primary fw-bold mt-5" href="{{ route('admin.posts.edit', $post->slug) }}" role="button">EDIT</a>

                <a class="btn btn-success mt-5 fw-bold ms-4" href="{{ url()->previous() }}" role="button">BACK</a>
                
            </div>
        </div>
    </div>
@endsection