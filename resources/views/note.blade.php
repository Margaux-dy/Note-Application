<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>NOTE PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-blue-300 p-9">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-6">NOTE PAGE</h1>
       
        <form action="{{ route('updateNote', ['id' => $note->id]) }}" method="POST">
            @csrf
            @method('PATCH')
           
            <div class="mb-4">
                <label for="title" class="text-xl font-semibold">Title:</label>
                <input type="text" id="title" name="title" value="{{ $note->title }}" class="block w-full mt-1 p-2 border rounded" required>
            </div>
           
            <div class="mb-4">
                <label for="content" class="text-xl font-semibold">Content:</label>
                <textarea id="content" name="content" class="block w-full mt-1 p-2 border rounded" rows="4" required>{{ $note->content }}</textarea>
            </div>
           
            <div class="mb-4">
                <label for="description" class="text-xl font-semibold">Description:</label>
                <textarea id="description" name="description" class="block w-full mt-1 p-2 border rounded" rows="2" required>{{ $note->description }}</textarea>
            </div>

            <form action="/notes" method="GET">
                <button type="submit" class="bg-gray-500 text-white px-2 py-1 rounded hover:bg-gray-600">Back</button>
            </form>            
            </div>
        </form>
    </div>
</body>
</html>
