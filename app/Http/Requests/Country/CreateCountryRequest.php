<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Country\Country;

class CreateCountryRequest extends FormRequest
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
        return Country::$rules;
    }
}
