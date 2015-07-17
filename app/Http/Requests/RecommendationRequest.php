<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RecommendationRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
