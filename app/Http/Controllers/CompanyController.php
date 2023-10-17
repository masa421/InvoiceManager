<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\File;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = new Company();
        $company = $company->get();
        return view('dashbord.dashbord',[
            'company' =>$company
            ]);


        // return view('compnies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // user_id info 
        $auth=auth()->user()->id;
        $user=User::find($auth);
        
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'address1' => 'required',
            'phone' => 'required',
            'profile' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo_img_path'] = $request->file('logo')->store('logos','public');
        }
        $formFields['user_id'] = auth()->id();
        $formFields['fax'] = $request['fax'];
        $formFields['address2'] = $request['address2'];
        $formFields['profile'] = $request['profile'];

        //$company->save();
        //return Redirect()->route('add.company');

        // dd($formFields);
        Company::create($formFields);

        return redirect('/')->with('message', 'Company Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$id = 3;
        //dd($id);
        //$company = Company::where('id', '=', $id);
        $company = Company::find($id);
        // dd($company);
        return view('company.edit',['company' => $company]);    
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function info()
    {
        // Check the company info Exists.
        $company = Company::where('user_id', '=', auth()->id())->first();
 
        if($company){
            return view('company.edit',['company' => $company]);    
        }else{
            return view('company.create');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$id = 3;
        //dd($id);
        //$company = Company::where('id', '=', $id);
        $company = Company::find($id);
        // dd($company);
        return view('company.edit',['company' => $company]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($id);
        $company = Company::find($id);
        
        // Make sure logged in user is owner
        if($company->user_id != auth()->id() ){
            abort(403, 'Unauthorized Action');
        }

        // dd($request->all());
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'address1' => 'required',
            'phone' => 'required',
            'profile' => 'required'
        ]);
        $formFields['user_id'] = auth()->id();
        $formFields['fax'] = $request['fax'];
        $formFields['address2'] = $request['address2'];

        if($request->hasFile('logo')){
            $formFields['logo_img_path'] = $request->file('logo')->store('logos','public');
        }
        // dd($formFields);
        $company->update($formFields);

        return back()->with('message', 'Company Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }


    /**
     * List all the companies.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function all(){
        //$companies = Company::all();
        $companies = Company::where('user_id', '=', auth()->id());
        //dd($companies);
        return view('company.all', [
            'companies' => auth()->user()->companies()->get()
        ]);
    }

}
