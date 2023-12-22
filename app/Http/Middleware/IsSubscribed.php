<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Course;

class IsSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $course_id = $request->route('course_id');
        $user_id = Auth::user()->id;

        $course = Course::find($course_id);
        if ($course->plan_id == 1) {
            return $next($request);
        }

        $transaksi = Transaksi::where('user_id', $user_id)->where('plan_id', $course->plan_id)->where('status_id', 4)->first();

        if (!$transaksi) {
            return redirect()->route('reader.pricing');
        }

        return $next($request);
    }
}
