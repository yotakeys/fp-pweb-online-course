<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Status;
use App\Models\Plan;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function formAddTransaksi(int $id)
    {
        $plan = Plan::find($id);

        return view('reader.add-transaksi', ['plan' => $plan]);
    }

    public function addTransaksi(Request $request)
    {
        $request->validate([
            'total_price' => 'required',
            'image' => 'required',
            'plan_id' => 'required',
        ]);



        $random_string = Str::random(10);

        $file_name = "{$random_string}-{$request->image->getClientOriginalName()}";
        $request->image->storeAs('public/images', $file_name);
        $image_url = "storage/images/{$file_name}";


        Transaksi::create([
            'user_id' => auth()->user()->id,
            'status_id' => 1,
            'total_price' => $request->total_price,
            'image_url' => $image_url,
            'plan_id' => $request->plan_id,
        ]);

        return redirect()->route('reader.transaksi.list')->with('success', 'Transaksi added successfully');
    }


    public function getAllTransaksiAdmin(Request $request)
    {
        $request->validate([
            'search' => 'nullable|max:255',
        ]);

        if ($request->search) {
            $transaksis = Transaksi::with(['user', 'plan', 'status'])
                ->whereHas('user', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })
                ->orWhereHas('user', function ($query) use ($request) {
                    $query->where('email', 'like', '%' . $request->search . '%');
                })
                ->orWhereHas('status', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })
                ->get();
        } else {
            $transaksis = Transaksi::with(['user', 'plan', 'status'])->get();
        }

        $statuses = Status::all();

        return view('admin.list-transaksi', ['transaksis' => $transaksis, 'statuses' => $statuses, 'search' => $request->search]);
    }

    public function transaksiDetailAdmin(int $id)
    {
        $transaksi = Transaksi::with(['user', 'plan', 'status'])->find($id);
        $statuses = Status::all();
        return view('admin.transaksi-detail', ['transaksi' => $transaksi, 'statuses' => $statuses]);
    }

    public function changeStatusTransaksi(Request $request, int $id)
    {
        $request->validate([
            'status_id' => 'required',
            'report' => 'required',
        ]);

        $transaksi = Transaksi::find($id);
        $transaksi->status_id = $request->status_id;
        $transaksi->report = $request->report;
        $transaksi->save();

        return redirect()->route('admin.transaksi.list')->with('success', 'Status transaksi updated successfully');
    }

    public function getAllTransaksiReader(Request $request)
    {
        $request->validate([
            'search' => 'nullable|max:255',
        ]);

        if ($request->search) {
            $transaksis = Transaksi::with(['user', 'plan', 'status'])
                ->where('user_id', auth()->user()->id)
                ->orWhereHas('status', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })
                ->orWhereHas('plan', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })
                ->get();
        } else {
            $transaksis = Transaksi::with(['user', 'plan', 'status'])->where('user_id', auth()->user()->id)->get();
        }

        return view('reader.transaksi-list', ['transaksis' => $transaksis, 'search' => $request->search]);
    }

    public function formEditTransaksi(int $id)
    {
        $transaksi = Transaksi::with(['user', 'plan', 'status'])->find($id);

        return view('reader.edit-transaksi', ['transaksi' => $transaksi]);
    }

    public function editTransaksi(Request $request, int $id)
    {
        $request->validate([
            'image' => 'required',
        ]);

        $random_string = Str::random(10);

        $file_name = "{$random_string}-{$request->image->getClientOriginalName()}";
        $request->image->storeAs('public/images', $file_name);
        $image_url = "storage/images/{$file_name}";

        $transaksi = Transaksi::find($id);
        $transaksi->image_url = $image_url;
        $transaksi->save();

        return redirect()->route('reader.transaksi.list')->with('success', 'Transaksi updated successfully');
    }

    public function summary()
    {

        $transaksi = Transaksi::with(['user', 'plan', 'status'])->get();
        $plans = Plan::with(['transaksi', 'courses'])->get();


        return view('admin.summary', ['transaksi' => $transaksi, 'plans' => $plans]);
    }
}
