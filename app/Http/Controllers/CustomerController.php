<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    //

    public function list(){
        $customers = Customer::all();

        return $customers;
    }

    public function search(Request $request){

        $customer = Customer::where('rfc',$request->rfc)->get();

        if($customer->count() > 0){
            return response()->json(['statusp'=>'false']);
        }
    }

    public function edit(Customer $customer){
        $customer = Customer::find($customer->id);
          

        return view('edit')->with('customer', $customer);;
        
    }

    public function getCustomer(Customer $customer){
        $customer = Customer::find($customer->id);

        return $customer;
    }

    public function update(Request $request, Customer $customer){
        
        $request->validate([
            'rfc' => 'required|unique:customers,id,'.$customer->id,
        ]);
        
        $customer = Customer::find($customer->id);
        $customer->type = $request->type;
        $customer->name = $request->name;
        $customer->first_lastname = $request->first_lastname;
        $customer->second_lastname = $request->second_lastname;
        $customer->social_reason = $request->social_reason;
        $customer->rfc = $request->rfc;
        $customer->uso_cfdi = $request->uso_cfdi;
        $customer->status = $request->status;
        $customer->contact = $request->contact;
        $customer->phone = $request->phone;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->observations = $request->observations;
        $customer->country = $request->country;
        $customer->state = $request->state;
        $customer->municipality = $request->municipality;
        $customer->city = $request->city;
        $customer->postal_code = $request->postal_code;
        $customer->suburb = $request->suburb;
        $customer->street = $request->street;
        $customer->ext_num = $request->ext_num;
        $customer->int_num = $request->int_num;
        $customer->save();

        return response()->json(['status'=>'true']);
        
    }

    public function create(){
        return view('/create');
    }

    public function store(Request $request){
        $request->validate([
            'rfc' => 'required|unique:customers',
        ]);

        $customer = new Customer;
        
        $customer->type = $request->type;
        $customer->name = $request->name;
        $customer->first_lastname = $request->first_lastname;
        $customer->second_lastname = $request->second_lastname;
        $customer->social_reason = $request->social_reason;
        $customer->rfc = $request->rfc;
        $customer->uso_cfdi = $request->uso_cfdi;
        $customer->status = $request->status;
        $customer->contact = $request->contact;
        $customer->phone = $request->phone;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->observations = $request->observations;
        $customer->country = $request->country;
        $customer->state = $request->state;
        $customer->municipality = $request->municipality;
        $customer->city = $request->city;
        $customer->postal_code = $request->postal_code;
        $customer->suburb = $request->suburb;
        $customer->street = $request->street;
        $customer->ext_num = $request->ext_num;
        $customer->int_num = $request->int_num;
        $customer->save();

        return response()->json(['status'=>'true']);
    }

    public function destroy(Customer $customer){
        
        $customer->destroy($customer->id);
        $customer->save();

        return response()->json(['status'=>'true']);
        
    }
}
