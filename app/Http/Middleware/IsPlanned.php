<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transaksi;

class IsPlanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');
        $user_id = Auth::user()->id;

        $transaksi = Transaksi::where('user_id', $user_id)->where('plan_id', $id)->where('status_id', 4)->first();

        if ($transaksi) {
            return redirect()->route('reader.transaksi.list');
        }

        return $next($request);
    }
}
