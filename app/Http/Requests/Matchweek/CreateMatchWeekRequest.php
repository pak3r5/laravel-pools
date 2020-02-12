<?php

namespace App\Http\Requests\Matchweek;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Matchweek\Matchweek;

class CreateMatchweekRequest extends FormRequest
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
        return Matchweek::$rules;
    }
}
