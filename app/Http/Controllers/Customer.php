<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeedBack;
use App\Models\Propertys;
use App\Models\Complaint;
use App\Models\Payment;
use App\Models\User;

use Stripe\Stripe;
use Stripe\Charge;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;


class Customer extends Controller
{

    public function customer()
    {
        $feedbacks = FeedBack::where('customer_id', auth()->user()->id)->with(['property'])->orderBy('id', 'desc')->get();
        $complaints = Complaint::where('customer_id', auth()->user()->id)->with(['property'])->orderBy('id', 'desc')->get();
        $payment = Payment::where('customer_id', auth()->user()->id)->with(['property'])->first();
        return view('customer', compact('feedbacks', 'complaints', 'payment'));
    }

    public function buy_property(Request $request) 
    {
        if (auth()->user()->userroll !== 'customer') {
            return redirect()->back()->with('error', 'You Are Not A Customer');
        }
        elseif (Payment::where('customer_id', auth()->user()->id)->first()) {
            return redirect()->route('customer')->with('success', 'Already You Have A Property');
        }
        $property = Propertys::where('id', $request['id'])->first();
        return view('buy-property', compact('property'));
    }

    public function book_property(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'property_id' => 'required',
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $charge = Charge::create([
                'amount' => $request->amount * 100,
                'currency' => 'inr',
                'source' => $request->token,
                'description' => 'Payment by ' . auth()->user()->email,
                'receipt_email' => auth()->user()->email,
            ]);

            $payment = Payment::create([
                'customer_id' => auth()->user()->id,
                'property_id' => $request->property_id,
                'amount' => $request->amount,
                'transaction_id' => $charge->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Payment successful!',
                'transaction_id' => $payment->transaction_id
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }


    public function add_feedback(Request $request)
    {
        $request->validate([
            'feedback' => 'required|string|max:1000',
        ]);

        FeedBack::create([
            'customer_id' => auth()->user()->id, 
            'property_id' => Payment::where('customer_id', auth()->user()->id)->first()->property_id,
            'feedback' => $request->feedback,
        ]);
        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }

    public function add_complaint(Request $request)
    {
        $request->validate([
            'complaint' => 'required|string|max:1000',
        ]);

        Complaint::create([
            'customer_id' => auth()->user()->id, 
            'property_id' => Payment::where('customer_id', auth()->user()->id)->first()->property_id,
            'complaint' => $request->complaint,
            'status' => 'pending',
        ]);
        return redirect()->back()->with('success', 'add complaint success we fix it soon!');
    }

    public function edit_complaint(Request $request)
    {
        $request->validate([
            'complaint_id' => 'required',
            'complaint' => 'required|string|max:1000',
        ]);

        $data = Complaint::where('id', $request['complaint_id'])->where('customer_id', auth()->id())->first();
       
        if ($data) {
            $data->update([
                'complaint' => $request['complaint'],
            ]);
            return redirect()->back()->with('success', 'complaint edited successfull!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Failed!');
        }
    }

    public function delete_complaint(Request $request)
    {
        $data = Complaint::where('id', $request['complaint_id'])->where('customer_id', auth()->id())->first();
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Complaint Deleted successfully!');
        }
        else {
            return redirect()->back()->with('success', 'Complaint Deleted Failed. Data No Fount!');
        }
    }
}
