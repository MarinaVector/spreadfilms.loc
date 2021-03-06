<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidRecaptcha;

class StoreUserRequest extends FormRequest
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
            'firstname'            => 'required|max:255',
            'email'                => 'required|email|max:255|unique:users',
            'password'             => ['required', 'confirmed', 'min:6'],
            'privacy_policy'       => 'accepted',
            'g-recaptcha-response' => new ValidRecaptcha
        ];
    }
}
