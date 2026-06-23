<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
class RetryLog extends Model
{
    //
    protected $fillable = [
        'transaction_id',
        'retry_status',
        'response_message',
        'attempted_at'
    ];
    public function transaction (){
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
