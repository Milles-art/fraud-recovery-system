<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Transaction;
class AdminLog extends Model
{
    //
    protected $fillable = [
        'admin_id',
        'transaction_id',
        'action',
        'reason',
        'acted_on'
    ];
    public function user (){
        return $this->belongsTo(User::class);
    }
    public function transaction (){
        return $this->belongsTo(Transaction::class);
    }
}
