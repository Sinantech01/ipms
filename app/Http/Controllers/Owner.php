<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer; 
use App\Models\Propertys;
use App\Models\FeedBack;
use App\Models\Complaint;
use App\Models\Payment;
use App\Models\Work;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Owner extends Controller
{
    public function owner()
    {
        $propertys = Propertys::where('user_id', auth()->user()->id)->withCount('payment')->orderBy('id', 'desc')->get();
        $payments = Payment::orderBy('id', 'desc')->with(['property', 'user'])->get();
        $complaints = Complaint::orderBy('id', 'desc')->with(['property', 'user'])->get();
        $feedbacks = FeedBack::orderBy('id', 'desc')->with(['property', 'user'])->get();
        $monthIncome = Payment::where('created_at', '>=', Carbon::now()->startOfMonth())->sum('amount');
        $workers = User::where('userroll', 'worker')->orderBy('id', 'desc')->get();

        return view('owner', compact('propertys', 'payments', 'complaints', 'feedbacks', 'monthIncome', 'workers'));
    }

    public function add_property(Request $request)
    {

        $validated = $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:200',
            'address' => 'required|string|max:200',
            'rent' => 'required|numeric',
        ]);
        
        $imagePath = $request->file('img')->store('images', 'public');
        $data = Propertys::create([
            'img' => $imagePath,
            'name' => $validated['name'],
            'address' => $validated['address'],
            'rent' => $validated['rent'],
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->back()->with('success', 'Property Added successfully!');
    }

    public function edit_property(Request $request)
    {

        $data = Propertys::where('id', $request['property_id'])->where('user_id', auth()->id())->first();

        if ($request->file('img')) {
            $imagePath = $request->file('img')->store('images', 'public');
            $data->update(['img' => $imagePath]);
        }
        
        if ($data) {
            $data->update([
                'name' => $request['name'],
                'address' => $request['address'],
                'rent' => $request['rent'],
            ]);
            return redirect()->back()->with('success', 'Property edited successfull!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Failed!');
        }
        
    }

    public function delete_property(Request $request)
    {
        $data = Propertys::findOrFail($request['property_id']);
        $data->delete();
        return redirect()->back()->with('success', 'Property Deleted successfully!');
    }  

    public function assign_work(Request $request)
    {
        Work::create([
            'complaint_id' => $request['complaint_id'],
            'worker_id' => $request['worker_id'],
        ]);
        return redirect()->back()->with('success', 'Work assigned successfull!');
    }

}
