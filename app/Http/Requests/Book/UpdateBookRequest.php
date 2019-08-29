<?php

namespace App\Http\Requests\Book;

use App\Rules\AuthorExists;
use App\Rules\LanguageExists;

class UpdateBookRequest extends BookRequest
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
            'author'=> ['integer', new AuthorExists ],
            'language'=> ['integer', new LanguageExists ],
            'title'=>'string|min:3',
            'description'=>'string|min:5',
            'isbn'=>'string|min:10',
        ];
    }
}
