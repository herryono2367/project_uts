<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers=Customer::all();
        return view('pelanggan.index', compact('customers'));
// dd($customers);
    }
 public function create()
 {
     return view('pelanggan.create');
 }

 public function store(Request $request)
 {
$request->validate([
'nama'=>'required',
'kode'=>'required',
'harga'=>'required',
'merek'=>'required',
'warna'=>'required',
'tipe'=>'required'


]);
$data= Customer::create($request->all());
return redirect('customer');
 }

public function destroy($id)
{
    $customer=Customer::where('id',$id)->first();
    $customer->delete();
    return redirect('customer');
}


public function edit($id)
   {
       
      $customer = customer::find($id);

      return view('pelanggan.edit',  compact('customer'));
   }
   public function update(Request $request, Customer $customer )
   {
    $request->validate([
        'nama'=>'required',
        'kode'=>'required',
        'harga'=>'required',
        'merek'=>'required',
        'warna'=>'required',
        'tipe'=>'required'
        
        
        ]);  
    $customer->update($request->all());
    return redirect('customer');

   }
}