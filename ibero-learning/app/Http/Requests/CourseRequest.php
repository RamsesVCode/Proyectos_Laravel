<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
        switch ($this->method()) {
            case "POST": {
                return [
                    'title' => 'required|min:5|unique:courses',
                    'categories' => 'required|array',
                    'description' => 'required|min:50',
                    'price' => 'required',
                    'picture' => 'required|image'
                ];
            }
            case "PUT": {
                return [
                    'title' => 'required|min:5|unique:courses,title,' . $this->route('course')->id,
                    'categories' => 'required|array',
                    'description' => 'required|min:50',
                    'price' => 'required',
                    'picture' => 'required|sometimes|image'
                ];
            }
            default: {
                return [];
            }
        }

    }
}
