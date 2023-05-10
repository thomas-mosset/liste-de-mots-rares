<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormWordRequest;
use App\Models\Word;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WordController extends Controller
{
    public function index (): View
    {
        $words = Word::paginate(6);

        return view('liste.index', [
            'words' => $words,
        ]);
    }

    // create view
    public function create ()
    {
        // dd(session()->all());

        $data = array(
            'types' => ['n. m.', 'n. f.', 'n.', 'adj.', 'v.'],
        );

        return view('liste.create', compact('data'));
    }

    public function store (FormWordRequest $request) 
    {
        // dd($request->validated(['word']));

        $word = Word::create([
            'word' => $request->validated(['word']),
            'definition' => $request->validated(['definition']),
            'exemple' => $request->input('exemple'),
            'pronunciation' => $request->input('pronunciation'),
            'type' => $request->validated(['type']),
            'slug' => $request->validated('slug'),
        ]);
        
        // $word = Word::create($request->validated());

        return redirect()->route('liste.showOne', ['slug' => $word->slug, "id" => $word->id])->with('success', "Le mot a bien été ajouté.");
    }

    public function edit(Word $word) 
    {
        $data = array(
            'types' => ['n. m.', 'n. f.', 'n.', 'adj.', 'v.'],
        );

        return view('liste.edit', [
            'word' => $word,
            'data' => $data,
        ]);
    }

    public function update (Word $word, FormWordRequest $request) 
    {
        $word->update([
            'word' => $request->validated(['word']),
            'definition' => $request->validated(['definition']),
            'exemple' => $request->input('exemple'),
            'pronunciation' => $request->input('pronunciation'),
            'type' => $request->validated(['type']),
            'slug' => $request->validated('slug'),
        ]);

        return redirect()->route('liste.showOne', ['slug' => $word->slug, "id" => $word->id])->with('success', "Le mot a bien été modifié.");
    }

    public function destroy (string $id) 
    {
        $word = Word::findOrFail($id);

        $word->delete();

        return redirect()->route('liste.index')->with('success', "Le mot a bien été supprimé.");
    }


    // show 1 word (page)
    public function show (string $slug, string $id): RedirectResponse | View 
    {
        $word = Word::findOrFail($id);

        if ($word->slug !== $slug) {
            return to_route('liste.showOne', ['slug' => $word->slug, 'id' => $word->id]);
        }

        return view('liste.show', [
            'word' => $word,
        ]);
    }
}