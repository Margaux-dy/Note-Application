<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Edit Note</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-blue-300 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center mb-6">Edit Note</h1>


        <form action="{{ route('updateNote', ['id' => $note->id]) }}" method="POST" class="space-y-4">
            @method('PUT')
            @csrf

            <div>
                <label for="title" class="block text-gray-700 font-semibold">Title:</label>
                <input type="text" id="title" name="title" value="{{ $note->title }}" required class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-semibold">Description:</label>
                <input type="text" id="description" name="description" value="{{ $note->description }}" required class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="content" class="block text-gray-700 font-semibold">Content:</label>
                <textarea id="content" name="content" required class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $note->content }}</textarea>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Update</button>
                
                <form action="/notes" method="GET">
                    <button type="submit" class="bg-gray-500 text-white px-2 py-1 rounded hover:bg-gray-600">Back</button>
                </form>              
            </div>
        </form>
    </div>
</body>
</html>
