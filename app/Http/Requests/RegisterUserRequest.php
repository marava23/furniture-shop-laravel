<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
    private $usernamePattern = "/^(?=.*[a-z])[a-zA-Z0-9\_]{8,25}$/";
    private $emailPattern = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    private $passwordPattern = "/^(?=.*\d)(?=.*[a-z]).{8,}$/";

    public function rules()
    {
        return [
            "firstname" => ["required", "min:3", "max:25"],
            "lastname" => ["required", "min:3", "max:25"],
            "username" => ["required", "min:8", "max:25", "unique:users", "regex:" . $this->usernamePattern],
            "email" => ["required", "regex:" . $this->emailPattern, "unique:users"],
            "password" => ["required", "regex:" . $this->passwordPattern],
        ];
    }
}
