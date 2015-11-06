<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CustomerRequest extends Request
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
     * Sanitize input before validation.
     *
     * @return array
     */
    public function sanitize()
    {
        $this->inputs['phone'] = trim($this->inputs['phone']);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company' => 'sometimes|unique:customers',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'sometimes|email',
        ];
    }
}
