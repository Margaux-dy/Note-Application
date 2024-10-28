<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE NOTE</title>
</head>
<body>
    <h1>CREATE NOTE PAGE</h1>

    <form action="{{ route('storeNote') }}" method="POST">
        @method('POST')
        @csrf        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>
        <label for="content">Content</label>
        <input type="text" id="content" name="content" required><br>
        <label for="description">Description:</label>
        <input type="description" id="description" name="description" required><br>


        <button type="submit">Create</button>
        </form>

        <form action ="{{ route ('showAllNotes')}}" method= "GET">
            <button type="submit">Back</button>
        </form> 
    </body>
</html>
