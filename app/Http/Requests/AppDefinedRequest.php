<?php

namespace App\Http\Requests;

use App\Constants\HttpResponseConstant;
use App\Exceptions\ValidationException;
use App\Services\ResponseService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AppDefinedRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException(HttpResponseConstant::HTTP_STATUS_ERROR_BAD_REQUEST,
                                            $validator->errors()->all());
    }

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
            //
        ];
    }
}
