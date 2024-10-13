<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $routeId = $this->route('video');

        return [
            'name' => 'required|min:3|unique:videos,name,' . $routeId . ',uuid',
            'description' => 'required|min:3',
            // 'thumbnail' => $this->method() === 'POST' ? 'required|image|mimetypes:image/jpeg,image/png,image/gif,image/svg|mimes:jpeg,png,jpg,gif,svg|max:2048' : 'nullable|image|mimetypes:image/jpeg,image/png,image/gif,image/svg|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'file' => $this->method() === 'POST'
                ? 'required|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|mimes:mp4,avi,mpeg,mov|max:10240'
                : 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|mimes:mp4,avi,mpeg,mov|max:10240'

        ];
    }
}
