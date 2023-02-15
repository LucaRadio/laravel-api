<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class updateProjectRequet extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|string|max:255|min:1",
            "description" => "required|string",
            "img_cover" => 'nullable',
            "github_link" => "required|url",
            "type_id" => "nullable|exists:types,id",
            "technologies" => "exists:technologies,id"
        ];
    }
}
