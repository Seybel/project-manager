<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Checks if a user is logged in before accessing app's content
        if (Auth::check()) {
            $projects = Project::where('user_id', Auth::user()->id)->get();

            return view('projects.index', ['projects' => $projects]);
        }

        //if user is not logged in, redirect to login page
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        $companies = null;
        //Checks if a company_id is not in the create route and if so, lists all the companies related to the user
        if(!$company_id) {
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }

        //Displays a form page where user can add new projects 
        return view('projects.create', ['company_id' => $company_id, 'companies' => $companies]);
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
            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'company_id' => $request->input('company_id'),
                'user_id' => Auth::user()->id
            ]);
            if ($project) {
                return redirect()->route('projects.show', ['project' => $project->id])
                    ->with('success', 'project created successfully');
            }
        }

        //redirect
        return back()->withInput()->with('errors', 'Error creating a new project');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project = Project::find($project->id);

        return view('projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $project = Project::find($project->id);

        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //save data
        $projectUpdate = Project::where('id', $project->id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description')
            ]);
        //check if update is done, redirect and display a success message
        if ($projectUpdate) {
            return redirect()->route('projects.show', ['project' => $project->id])
                ->with('success', 'Project updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //finds id of project specified for deletion
        $findProject = Project::find($project->id);

        //deletes from database if found
        if ($findProject->delete()) {

            //redirect to index page upon deletion
            return redirect()->route('projects.index')
                ->with('success', 'Project deleted succesfully');
        }
        //if id not found, go back to previous page and retain previous input
        return back()->withInput()->with('errors', 'Project could not be deleted');
    }
}
