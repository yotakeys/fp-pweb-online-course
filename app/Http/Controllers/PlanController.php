<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{

    public function index()
    {
        $plans = Plan::all();   
        return view('pricing', ['plans' => $plans]);
    }

    public function formAddPlan()
    {
        return view('plan.plan-add');
    }

    public function addPlan(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Plan::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    }

    public function getAllPlan()
    {
        $plans = Plan::all();

        return view('plan.plan-all', ['plans' => $plans]);
    }

    public function getPlanById(int $id)
    {
        $plans = Plan::find($id);

        return view('plan.plan-by-id', ['plans' => $plans]);
    }

    public function getAllPlanReader()
    {
        $plans = Plan::all();

        return view('reader.pricing', ['plans' => $plans]);
    }
}
