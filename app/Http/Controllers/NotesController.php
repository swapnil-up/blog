<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Storage;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return response()->json($notes, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'nullable|array',
            'additional_properties' => 'nullable|json',
            'imageFile' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();
        $additionalProperties = json_decode($data['additional_properties'], true);

        if (isset($additionalProperties['imageFile']) && $request->hasFile('imageFile')) {
            $filepath = $request->file('imageFile')->store('n_images', 'public');
            $additionalProperties['image_url'] = Storage::url($filepath);
        }

        $note = Note::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'tags' => $data['tags'] ?? [],
            'additional_properties' => $additionalProperties,
        ]);
        return response()->json($note, 201);
    }

    public function destroy($id)
    {
        $note = Note::find($id);
        if (!$note) {
            return response()->json(['message' => 'note not found'], 404);
        }
        $note->delete();

        return
            response()->json(['message' => 'deleted successfully'], 200);
    }
}
