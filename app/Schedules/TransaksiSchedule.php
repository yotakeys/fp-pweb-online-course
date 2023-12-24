<?php

namespace App\Schedules;

use App\Models\Transaksi;

class TransaksiSchedule
{
    public static function updateStatus(): void
    {
        $transaksi = Transaksi::where('status_id', '=', '3')->get();
        foreach ($transaksi as $trans) {
            if ($trans->updated_at->diffInDays() >= 2) {
                $trans->status_id = 2;
                $trans->save();
            }
        }
    }
}
