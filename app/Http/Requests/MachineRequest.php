<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MachineRequest extends Request
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
            'customer_id' => 'required',
            'serial' => 'required',
            'sold_date' => 'required',
            'bucket_id' => 'required',
            'bracket_id' => 'required',
            'auger_id' => 'required',
            'motor_id' => 'required',
        ];
    }
}
