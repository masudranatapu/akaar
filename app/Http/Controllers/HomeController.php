<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    //
    public function index()
    {
        return view('welcome');
    }

    public function c_list()
    {
        $customers = Customer::latest()->get();
        $m_cus =Customer::where('gender', 'Male')->count();
        $f_cus =Customer::where('gender', 'Female')->count();
        return view('customer.index', compact('customers', 'm_cus', 'f_cus'));
    }

    public function store(Request $request)
    {
        $s_customer = $this->customer->customerStore($request);

        if($s_customer['status'] == 0) {
            return redirect()->back()->with('msg', 'Data unable to created');
        }

        return redirect()->back()->with('msg', 'Data successfully created');
    }

    public function edit(Request $request)
    {
        // dd($request->all());
        $customer = Customer::findOrFail($request->id);
        $html = view('customer.edit', compact('customer'))->render();
        return response()->json($html);
    }



    public function update(Request $request, $id)
    {
        $s_customer = $this->customer->customerUpdate($request, $id);

        if($s_customer['status'] == 0) {
            return redirect()->back()->with('msg', 'Data unable to updated');
        }

        return redirect()->back()->with('msg', 'Data successfully updated');
    }


    public function delete($id)
    {
        // dd($id);
        $s_customer = $this->customer->putDelete($id);

        if($s_customer['status'] == 0) {
            return redirect()->back()->with('msg', 'Data unable to delete');
        }

        return redirect()->back()->with('msg', 'Data successfully delete');
    }



}
