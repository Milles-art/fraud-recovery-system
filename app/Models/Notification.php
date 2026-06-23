<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Transaction;
class Notification extends Model
{
    //
    protected $fillable = [
        'user_id',
        'type',
        'channel',
        'read_at',
        'status',
        'transaction_id',
        'response_message'
    ];
    public function user (){
        return $this->belongsTo(User::class);
    }
    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
