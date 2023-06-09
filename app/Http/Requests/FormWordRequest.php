<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FormWordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'word' => ['required', 'min:2', Rule::unique('words')->ignore($this->route()->parameter('word'))],
           'definition' => ['required', 'min:8'],
           // 'exemple' => ['min:2'],
           // 'pronunciation' => ['min:2'],
           'type' => ['required'],
           'slug' => ['required', 'min:2', 'regex:/^[a-z0-9\-]+$/', Rule::unique('words')->ignore($this->route()->parameter('word'))], 
           // Rule::unique('words')->ignore($this->route()->parameters('word')) signifie qu'on doit obligatoirement renseigner un slug unique mais qu'à la maj, on ignorera cette règle.
           // Fonctionnerait aussi avec : Rule::unique('words')->ignore($this->word)
        ];
    }

    protected function prepareForValidation()
    {
        // si le slug n'existe pas, alors on en crée un à partir du champs mot rempli dans le formulaire
        $this->merge([
           'slug' => $this->input('slug') ?: Str::slug($this->input('word')),
        ]);
    }
}
