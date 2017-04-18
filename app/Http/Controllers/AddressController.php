<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Support\Facades\DB;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Paginator;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       echo "hello";
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
        'email' => 'required|email|unique:contact',
        'phone' => 'required|min:11|numeric|unique:contact'
        ]);

        $contact = new Address();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->company = $request->company;
        $contact->dob = $request->dob;
        $contact->save();
        return redirect('home')->with('message','Your Contact Create Successfull !');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Address = Address::findOrFail($id);

        if(!$Address){
          abort(404);
        }
        return view('page.edit')->with('Address',$Address);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $contactUp= Address::findOrFail($id);
        DB::table('contact')
        ->where('id', $id)
        ->update(['name' =>$request['name'],
        'email'=>$request['email'],
        'phone'=>$request['phone'],
        'address'=>$request['address'],
        'company'=>$request['company'],
        'dob'=>$request['dob']
        ]);
        $contactUp->save();
        return redirect('home')->with('message','Your Data Hasbeen Update!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Address::find($id);
        $contact->delete();
        return redirect('home')->with('message','Your Data Hasbeen Delete!');
    }
}
