<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Work;

class Worker extends Controller
{
    public function worker()
    {
        $works = Work::where('worker_id', auth()->user()->id)->with(['complaint'])->orderBy('id', 'desc')->get();
        return view('worker', compact('works'));
    }

    public function work_completed(Request $request)
    {
        $data = Complaint::where('id', $request['complaint_id'])->first();
        $data->update(['status' => 'completed']); 
        return redirect()->back()->with('success', 'Work completed successfull!');
    }
}
