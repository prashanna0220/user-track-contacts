<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use JeroenDesloovere\VCard\VCard;
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
    public function index(Request $request)
    {

        $userId = Auth::id();         
        if($request->input('search')){
            $search = $request->get('search');
            $Usercontact = Address::where('name','LIKE','%'.$search.'%')
            ->orWhere("email", "LIKE", "%$search%")
            ->orWhere("phone", "LIKE", "%$search%")
            ->orWhere("address", "LIKE", "%$search%")
            ->orWhere("company", "LIKE", "%$search%")
            ->orWhere("dob", "LIKE", "%$search%")->paginate(6);
            return view('home')->with('Usercontact',$Usercontact);
        }else{
            $Usercontact = Address::where('user_id',$userId)->orderBy('created_at', 'desc')->paginate(6); 
            return view('home')->with('Usercontact',$Usercontact); 
        } 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVcard()
    {
        $UserContact = Address::orderBy('created_at', 'DESC')->get();
        $vcard = new VCard();
        foreach ($UserContact as $User) {
            $vcard->addName($User->name);
            $vcard->addEmail($User->email);
            $vcard->addPhoneNumber($User->phone);
            $vcard->addAddress($User->address);
            $vcard->addCompany($User->company); 
            $vcard->addBirthday($User->dob); 
         return $vcard->download();
        }
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
        $userId = Auth::id();
        $contact = new Address();
        $contact->user_id = $userId;
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
    public function getSearch(Request $request)
    {

        $search = $request->input('search');

        $blogs = Address::where('name','LIKE','%'.$search.'%')
        ->orWhere("email", "LIKE", "%$search%")
        ->orWhere("phone", "LIKE", "%$search%")
        ->orWhere("address", "LIKE", "%$search%")
        ->orWhere("company", "LIKE", "%$search%")
        ->orWhere("dob", "LIKE", "%$search%")
        ->orderBy('id')->paginate(6);
        return redirect('home');

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
