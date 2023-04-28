<?php

namespace App\Http\Controllers;

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
        /* Validator::make([
            // champs à valider
            'word' => '',
            'definition' => '',
            'exemple' => "",
            'slug' => "",
        ], [
            // règles de validation
           'word' => ['require', 'min:2', Rule::unique('words')],
           'definition' => ['require', 'min:8'],
           'exemple' => ['min:8'],
           'slug' => ['require', 'min:2', 'regex:/^[a-z0-9\-]+$/'],
        ]); */

        $words = Word::paginate(6);

        return view('liste.index', [
            'words' => $words,
        ]);
    }

    // create view
    public function create ()
    {
        $data = array(
            'types' => ['n. m.', 'n. f.', 'n.', 'adj.', 'v.'],
        );

        return view('liste.create', compact('data'));
    }

    public function store (Request $request) 
    {
        $word = Word::create([
            'word' => $request->input('word'),
            'definition' => $request->input('definition'),
            'exemple' => $request->input('exemple'),
            'pronunciation' => $request->input('pronunciation'),
            'type' => $request->input('type'),
            'slug' => $request->input('slug'),
        ]);

        // dd($word);

        return redirect()->route('liste.showOne', ['slug' => $word->slug, "id" => $word->id])->with('success', "Le mot a bien été ajouté.");
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