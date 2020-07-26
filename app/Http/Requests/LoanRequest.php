<?php

namespace App\Http\Requests;

class LoanRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  [
            'amount'     => 'required|numeric',
            'loan_term'  => 'required'
        ];
    }
}
