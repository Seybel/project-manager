@extends('layouts.app')

@section('content')
<div class="col-md-9 col-lg-9 col-sm-9 mt-4 pull-left">
    <!-- Jumbotron -->
    <div class="jumbotron">
        <h1>{{ $company->name }}</h1>
        <p class="lead">{{ $company->description }}</p>
        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
    </div>

    <!-- Example row of columns -->
    <div class="row bg-white" style="margin:2px">

        @foreach($company->projects as $project)
        <div class="col-lg-4 mt-3">
            <h2>{{ $project->name }}</h2>
            <p class="text-danger">{{ $project->description }}</p>
            <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project »</a></p>
        </div>
        @endforeach

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
            <li><a href="/companies/{{ $company->id }}/edit">Edit</a></li>
            <li><a href="/projects/create">Add new Project</a></li>
            <li><a href="/companies">All companies</a></li>
            <li><a href="/companies/create">Create new company</a></li>
            <li>
                <a href="#" onclick="var result = confirm('Are you sure you want to delete this company?');
                    if (result) {
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                    }">
                    Delete
                </a>

                <form id="delete-form" method="post" action="{{ route('companies.destroy', [$company->id]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                </form>

            </li>
            <!-- <li><a href="#">Add new User</a></li> -->
        </ol>
    </div>
    <!-- <div class="sidebar-module">
        <h4>Members</h4>
        <ol class="list-unstyled">
            <li><a href="#">March 2014</a></li>
    </div> -->
</div>

@endsection