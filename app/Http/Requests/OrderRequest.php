<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'filter_manufacturer'   => 'sometimes|required|string|max:255',
            'filter_name'           => 'sometimes|required|string|max:255',
            'comments'              => 'sometimes|nullable',
            'fullname'              => ['sometimes','required','regex:/(^[\pL]+[\s]+[\pL]+[\s]+[\pL]+$)/u']
        ];
    }
}
