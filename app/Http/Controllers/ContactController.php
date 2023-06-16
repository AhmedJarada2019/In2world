<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.contacts.index',[
            'contacts'=>Contact::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = $request->validate([
            'name'          =>'required|string|min:3',
            'email'         =>'required|email|string|min:3|max:255',
            'country_code'  =>'required',
            'phone'         =>'required|integer',
            'subject'       =>'required|min:3|max:255',
            'description'   =>'required',
        ],[
            '*.required' => 'هذا الحقل مطلوب',
            'phone.integer'=>'يجب ان يتكون من اعداد صحيحة',
            'email.email'=>'يجب ان يكون ايميل صالح '
        ]);
        $contact['ip_address'] =  $request->ip();

        $addContact = Contact::create($contact);
        if($addContact)
        return response()->json([
            'message'=>'شكرا للتواصل ...... تم اضافة طلبك بنجاح'
        ],200);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
