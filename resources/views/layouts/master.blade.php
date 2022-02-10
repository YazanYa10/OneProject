<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>مكتبتي</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .red {}

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
</head>

<body>
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
                    <strong>
                        My Blog
                    </strong>
                </a>
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            @if (Auth::user()->id != 1)
                                <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"
                                    onclick="event.preventDefault();
                                                                                            document.getElementById('logout-form').submit();">Log
                                    out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endif
                            <a href="{{ url('/home') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                            <a href="{{ url('/info') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Info</a>
                            @if (Auth::user()->hasRole('admin'))

                                <a href="{{ url('/showusers') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Show All Users</a>
                                <a href="{{ url('/controlarticles') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Control Article</a>
                            @elseif(Auth::user()->hasRole('editor'))
                                <a href="{{ url('/showuserseditor') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Show All Users</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                                in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </header>
    <main>
        @yield('body')
    </main>
    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1"><a href="#">A Bove</a></p>
            <p class="mb-1">Demo site to learn Laravel</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
