@extends('layouts.app')

@section('content')

<div class="row col-md-9 col-lg-9 col-sm-9 mt-4 pull-left bg-white">
    <h1 style="margin-left: 15px; color: #3490dc;">Create new project</h1>

    <!-- Example row of columns -->
    <div class="col-md-12 col-lg-12 col-sm-12">

        <form method="post" action="{{ route('projects.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="project-name">Name<span class="required" style="color: #8b0000">*</span></label>
                <input  placeholder="Enter name" 
                        id="project-name"
                        required 
                        name="name"
                        spellcheck="false"
                        class="form-control"/>
            </div>

                <input  type="hidden"
                        name="company_id"
                        value="{{ $company_id }}"/>


            <div class="form-group">
                <label for="project-content">Description</label>
                <textarea   placeholder="Enter description"
                            style="resize: vertical"
                            id="project-content"
                            name="description"
                            class="form-control autosize-target text-left"
                            rows="5" spellcheck="false">
                </textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>


    </div>

</div>


<div class="col-sm-3 col-md-3 col-lg-3 mt-4 pull-right">
    <!-- <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div> -->
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects">My Projects</a></li>
        </ol>
    </div>

</div>

@endsection