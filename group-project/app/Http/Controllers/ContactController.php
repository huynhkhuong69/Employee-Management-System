<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        return view('pages.contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        //Form Validation
        $formFields = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message'=>'required',
           // 'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'  
        ]);
    
        $success = Contact::create($formFields);
        if($success){
            return redirect()->route('contact')->with('success', 'Message sent successfully');
        }else{
            return redirect()->route('contact')->with('error', 'Something went wrong');
        }
      
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}