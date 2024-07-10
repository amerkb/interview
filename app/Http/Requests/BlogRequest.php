<?php

namespace App\Http\Requests;

use App\Statuses\UserStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if ($this->method() == 'POST' && Auth::user()->role == UserStatus::USER) {

            return [
                'title' => 'required',
                'description' => 'required',
                'file' => 'nullable|file',

            ];
        } elseif (Auth::user()->role === UserStatus::USER) {

            return [
                'title' => '',
                'description' => '',
                'file' => 'nullable|file',

            ];

        } elseif ($this->method() == 'POST' && Auth::user()->role == UserStatus::ADMIN) {
            return [
                'title' => 'required',
                'description' => 'required',
                'file' => 'nullable|file',
                'users.*' => 'required|exists:users,id',

            ];

        } else {

            return [
                'title' => '',
                'description' => '',
                'file' => 'nullable|file',
                'users.*' => 'nullable|exists:users,id',
            ];
        }

    }
}
