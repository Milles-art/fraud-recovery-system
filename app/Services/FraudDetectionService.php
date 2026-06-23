<?php
namespace App\Services;

use App\Models\Transaction;
use Illuminate\Support\Carbon;
class FraudDetectionService
{
public function calculateRiskScore(Transaction $transaction){
    //
    $score=0;

    $score += $this->checkUnusualAmount($transaction);
    $score += $this->checkVelocity($transaction);
    $score += $this->checkOddHour($transaction);
    return $score;
}
private function checkUnusualAmount (Transaction $transaction) {
    $averageAmount = Transaction::where('sender_id', $transaction->sender_id)->avg('amount');
    if ($averageAmount && $transaction->amount > ($averageAmount * 5)) {
        return 30;
    } else {
        return 0;
    }   
}
private function checkVelocity(Transaction $transaction) {
$recentCount = Transaction::where('sender_id', $transaction->sender_id)
    ->where('created_at', '>=', Carbon::now()->subMinutes(2))
    ->count();
    if ($recentCount>=5) {
        return 25;
    } else {
       return 0;
    }
    
}
private function checkOddHour (Transaction $transaction){
$hourCount = Transaction::where('sender_id', $transaction->sender_id)
->where('created_at', '>=', Carbon::now()->subHour(1))
->count();
if ($hourCount>=4) {
    return 25;
} else {
   return 0;
}

}
}