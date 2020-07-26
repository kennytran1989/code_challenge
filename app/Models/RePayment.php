<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RePayment extends Model
{
    protected $table = 'repayment';


    /**
     * @var array
     */
    protected $fillable = [
        'loan_id',
        'amount',
        'status',
    ];

    public function loan()
    {
        return $this->belongsTo('App\Models\Loan');
    }
}
