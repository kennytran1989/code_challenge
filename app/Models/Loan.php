<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'loan';


    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'amount',
        'loan_term',
        'status_loan'
    ];

    public function rePayment()
    {
        return $this->hasMany('App\Model\Repayment', 'loan_id', 'id');
    }
}
