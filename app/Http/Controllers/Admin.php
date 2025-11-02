<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propertys;
use App\Models\FeedBack;
use App\Models\Complaint;
use App\Models\Payment;
use App\Models\Work;
use App\Models\User;
class Admin extends Controller
{
    public function admin()
    {
        $propertys = Propertys::orderBy('id', 'desc')->get();
        $payments = Payment::orderBy('id', 'desc')->get();
        $complaints = Complaint::orderBy('id', 'desc')->get();
        $feedbacks = FeedBack::orderBy('id', 'desc')->get();
        $users = User::orderBy('id', 'desc')->get();

        return view('admin', compact('propertys', 'payments', 'complaints', 'feedbacks', 'users'));
    }

    public function add_user(Request $request)
    {
        $data = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'userroll' => $request['userroll'],
            'password' => $request['password'],
        ]);
        return redirect()->back()->with('success', 'User Added successfully!');
    }

    public function edit_user(Request $request)
    {

        $data = User::where('id', $request['id'])->first();
        
        if ($data) {
            $data->update([
                'name' => $request['name'] ?? $data->name,
                'email' => $request['email'] ?? $data->email,
                'phone' => $request['phone'] ?? $data->phone,
                'userroll' => $request['userroll'] ?? $data->userroll,
                'password' => $request['password'] ?? $data->password,
            ]);
            return redirect()->back()->with('success', 'User edited successfull!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Failed!');
        }
        
    }

    public function delete_user(Request $request)
    {
        $data = User::findOrFail($request['id']);
        $data->delete();
        return redirect()->back()->with('success', 'User Deleted successfully!');
    }  
}
