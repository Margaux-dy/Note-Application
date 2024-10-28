<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{

    public function index()
    {
        $notes = Note::all();

        return view('welcome', [
            'notes' => $notes
        ]);
    }

    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'content' => 'required|string',
    ]);

    Note::create([
        'title' => $request->title,
        'description' => $request->description,
        'content' => $request->content,
    ]);
    return redirect('/notes')->with('success', 'Note added successfully!');
    }   

    public function updateStatus(Note $note)
    {
        $note->update(['isDone' => true]);
        return redirect('/')->with('success', 'Note marked as done!');
    }

    public function update(Note $note)
    {
        $note->update(['isDone' => true]);
         
        return redirect('/')->with('success', 'Note updated successfully!');   
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect('/')->with('success', 'Note deleted successfully.');
    }
    
    public function showAllNotes()
    {
        $notes = Note::orderBy('updated_at', 'desc')->get();
        return view('notes', ['notes' => $notes]);
    }

    public function createNote()
    {  
        return view('createNote');
    }

    public function searchNote(Request $request)
    {
        $query = $request->input('query');

        $notes = Note::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();
        return view('notes', compact('notes'));
    }

    public function storeNote(Request $request)
    {
        $validated = $request->validate ([
            'title' => 'required|max:255',
            'content' => 'required|max:10000',
            'description' => 'required|max:10000',
        ]);
   
        $note = new Note();
        $note->title = $validated['title'];
        $note->content = $validated['content'];
        $note->description = $validated['description'];
        $note->save();

        return redirect()->route('showAllNotes')->with('success', 'Note created successfully.');
    }

    public function viewNote(Request $request)
    {
        $note = Note::find($request->id);
        return view('note', ['note' => $note]);
    }

    public function editNote(Request $request)
    {
        $note = Note::find($request->id);
        return view('editNote', ['note' => $note]);
    }

    public function updateNote(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
            'description' => 'required|string|max:10000',
        ]);

        $note = Note::find($request->id);
        $note->title = $validated['title'];
        $note->content = $validated['content'];
        $note->description = $validated['description'];
        $note->save();

        return redirect()->route('viewNote', ['id' => $note->id])->with('success', 'Note updated successfully.');
    }

    public function deleteNote(Request $request)
    {
        $note = Note::find($request->id);
        if ($note)
        {
            $note->delete();
            return redirect()->route('showAllNotes')->with('Success', 'Note deleted successfully.');
        }
    }
}
