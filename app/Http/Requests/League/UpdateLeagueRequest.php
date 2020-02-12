<?php

namespace App\Http\Requests\League;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\League\League;

class UpdateLeagueRequest extends FormRequest
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
        $rules = League::$rules;
        
        return $rules;
    }
}
