<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class WordController extends Controller
{
    public function index (): View
    {
        $words = \App\Models\Word::paginate(1);

        return view('liste.index', [
            'words' => $words,
        ]);
    }

    public function show (string $slug, string $id): RedirectResponse | Word 
    {
        $word = \App\Models\Word::findOrFail($id);

        if ($word->slug !== $slug) {
            return to_route('liste.showOne', ['slug' => $word->slug, 'id' => $word->id]);
        }

        return $word;
    }
}