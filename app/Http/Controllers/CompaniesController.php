<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Checks if a user is logged in before accessing app's content
        if (Auth::check() ) {
        $companies = Company::where('user_id', Auth::user()->id)->get();

        return view('companies.index', ['companies' => $companies]);
        }

        //if user is not logged in, redirect to login page
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Displays a form page where user can add new companies 
        return view('companies/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //After inputing details in the "create" form, the below stores the input in the database
        if (Auth::check()) {
        $company = Company::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id
        ]); 
            if($company) {
               return redirect()->route('companies.show', ['company' => $company->id])
               ->with('success', 'Company created successfully'); 
            }
        }

        //redirect
        return back()->withInput()->with('errors', 'Error creating a new company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company = Company::find($company->id);

        return view('companies.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        $company = Company::find($company->id);

        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //save data
        $companyUpdate = Company::where('id', $company->id)
                                ->update([
                                    'name' => $request->input('name'),
                                    'description' => $request->input('description')
        ]);
        //check if update is done, redirect and display a success message
        if($companyUpdate) {
            return redirect()->route('companies.show', ['company' => $company->id])
            ->with('success', 'Company updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //finds id of company specified for deletion
        $findCompany = Company::find($company->id);

        //deletes from database if found
        if($findCompany->delete()) {

        //redirect to index page upon deletion
            return redirect()->route('companies.index')
            ->with('success', 'Company deleted succesfully');

        }
        //if id not found, go back to previous page and retain previous input
        return back()->withInput()->with('errors', 'company could not be deleted');
    }
}
