<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Task List App</title>
</head>
<body class="font-mono">
    <header>
        <div class="py-8 min-h-[20%] flex items-center justify-center">
            <a href="/">
                <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/task.png" alt="task"/>
            </a>

            <h1 class="px-8">Task List App</h1>
            <div class="border-4 rounded-lg bg-black text-white">
                <a href="{{ route('tasks.add') }}">Add Task</a>
            </div>
        </div>

    </header>
    <main>
        <h2 class="py-12 text-xl">@yield('title')</h2>
        @yield('main')
    </main>
    <footer></footer>
</body>
</html>
