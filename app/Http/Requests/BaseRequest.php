<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
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

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $code = \Illuminate\Support\Facades\Config::get('status_code.422');
        $data  = [
            'status'    => false ,
            'data'      => array(
                'code'      => $code,
                'message'   => $validator->errors()
            )
        ];
        $response = response()->json($data, $code);
        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
