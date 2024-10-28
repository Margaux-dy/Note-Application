<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (localStorage.getItem('theme') === 'dark') {
                document.documentElement.classList.add('dark');
            }
        });

        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');

            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        }
    </script>
</head>

<body class="bg-blue-300 dark:bg-gray-800 p-4 transition-colors duration-300">
    <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white dark:bg-gray-900 dark:text-white rounded-xl transition-colors duration-300">
        <h1 class="font-bold text-5xl text-center mb-8">Notes</h1>
        
        <div class="flex justify-end mb-6">
            <button onclick="toggleDarkMode()" class="bg-gray-200 dark:bg-gray-700 text-black dark:text-white px-2 py-1 rounded">Dark Mode</button>
        </div>

        <div class="mb-6 flex space-x-4">
            <form action="{{ route('showAllNotes') }}" method="GET">
                <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">&#8592; </button>
            </form>
        
            <form action="{{ route('searchNote') }}" method="GET" class="flex-grow flex space-x-2">
                <input type="text" name="query" placeholder="Search notes..." class="py-2 px-4 bg-gray-200 dark:bg-gray-800 dark:text-white rounded-lg w-full">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
            </form>
        </div>

        <form action="{{ url('/notes') }}" method="POST" class="flex flex-col space-y-4">
            @csrf
            <input type="text" name="title" placeholder="The note title" class="py-3 px-4 bg-gray-200 dark:bg-gray-100 dark:text-black rounded-xl">
            <textarea name="description" placeholder="The note description" class="py-3 px-4 bg-gray-200 dark:bg-gray-100 dark:text-black rounded-xl"></textarea>
            <textarea name="content" placeholder="The note content" class="py-3 px-4 bg-gray-200 dark:bg-gray-100 dark:text-black rounded-xl"></textarea>
            <button type="submit" class="w-28 py-2 px-2 bg-green-500 text-black rounded-xl">Add</button><br>            
        </form>
        
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($notes as $note)
            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold mb-2">Title: {{ $note->title }}</h3>
                <p class="text-gray-500 dark:text-gray-300 mb-2">Content: {{ $note->content }}</p>
                <p class="text-gray-500 dark:text-gray-300 mb-4">Description: {{ $note->description }}</p>

                <div class="flex space-x-2">
                    <form action="{{ route('viewNote', ['id' => $note->id])}}" method="GET">
                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">View</button>
                    </form>

                    <form action="{{ route('editNote', ['id' => $note->id]) }}" method="GET">
                        <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>
                    </form>

                    <form action="{{ route('deleteNote', ['id' => $note->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                    </form>                                  
                </div>
            </div>
            @endforeach
        </div> 
    </div>
</body>
</html>
