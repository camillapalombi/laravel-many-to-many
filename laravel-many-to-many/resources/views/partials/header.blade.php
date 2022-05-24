<header class="mb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-2" href="{{ route('admin.home') }}">LARAVEL AUTH POSTS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active fs-5 ms-4" style="color: white" aria-current="page" href="{{ route('admin.posts.index') }}">ALL POSTS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active fs-5 ms-5" style="color: white" href="{{ route('admin.posts.create') }}">CREATE NEW POST</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active fs-5 ms-5" style="color: white" href="{{ route('admin.posts.myindex') }}">MY POSTS</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active fs-5 ms-5" style="color: white" href="{{ route('admin.categories.index') }}">ALL CATEGORIES</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active fs-5 ms-5" style="color: white" href="{{ route('admin.categories.create') }}">NEW CATEGORY</a>
            </li>


            </ul>
        </div>
        </div>
    </nav>
</header>