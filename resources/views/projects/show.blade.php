@extends('layouts.app')

@section('content')
<div class="col-md-9 col-lg-9 col-sm-9 mt-4 pull-left">
    <!-- Jumbotron -->
    <div class="card card-body bg-light">
        <h1>{{ $project->name }}</h1>
        <p class="lead">{{ $project->description }}</p>
        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
    </div>

    <!-- Example row of columns -->
    <div class="row bg-white" style="margin:2px">

        <!-- {{-- @foreach($project->projects as $project)
        <div class="col-lg-4 mt-3">
            <h2>{{ $project->name }}</h2>
            <p class="text-danger">{{ $project->description }}</p>
            <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project »</a></p>
        </div>
        @endforeach --}} -->

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
            <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
            <li><a href="/projects/create">Create new Project</a></li>
            <li><a href="/projects">My projects</a></li>

            @if($project->user_id == Auth::user()->id)
            <li>
                <a href="#" onclick="var result = confirm('Are you sure you want to delete this project?');
                    if (result) {
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                    }">
                    Delete
                </a>

                <form id="delete-form" method="post" action="{{ route('projects.destroy', [$project->id]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                </form>

            </li>
            @endif

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