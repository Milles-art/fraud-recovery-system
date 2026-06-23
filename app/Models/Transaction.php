<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AdminLog;
use App\Models\Notification;
use App\Models\RetryLog;
use App\Models\User;

class Transaction extends Model
{
    //
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'amount',
        'payment_method',
        'reference',
        'status',
        'failure_category',
        'failure_reason',
        'retry_count',
        'next_retry_at',
        'resolved_at'


    ];
    public function sender (){
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver (){
        return $this->belongsTo(User::class, 'receiver_id');
    }
    public function retryLogs (){
        return $this->hasMany(RetryLog::class);
    }
    public function notifications(){
        return $this->hasMany(Notification::class);
    }
    public function adminLogs (){
        return $this->hasMany(AdminLog::class);
    }
}
