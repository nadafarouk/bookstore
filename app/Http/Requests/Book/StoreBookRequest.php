<?php

namespace App\Http\Requests\Book;

use App\Rules\LanguageExists;
use App\Rules\AuthorExists;

class StoreBookRequest extends BookRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'author'=> ['required','integer', new AuthorExists ],
            'language'=> ['required','integer', new LanguageExists ],
            'title'=>'required|string|min:3',
            'description'=>'required|string|min:5',
            'isbn'=>'required|string|min:10',
        ];
    }
}
