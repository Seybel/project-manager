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
    <div class="row mt-3 bg-white" style="margin:2px">

        <!-- {{-- @foreach($project->projects as $project)
        <div class="col-lg-4 mt-3">
            <h2>{{ $project->name }}</h2>
            <p class="text-danger">{{ $project->description }}</p>
            <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project »</a></p>
        </div>
        @endforeach --}} -->

        <div class="col-md-12 col-lg-12 col-sm-12">

            <form method="post" action="{{ route('comments.store') }}">
                {{ csrf_field() }}

                <input type="hidden" name="commentable_type" value="Project">
                <input type="hidden" name="commentable_id" value="{{ $project->id }}">

                <div class="form-group">
                    <label for="comment-content">Comment</label>
                    <textarea   placeholder="Enter comment"
                                style="resize: vertical"
                                id="comment-content"
                                name="body"
                                class="form-control autosize-target text-left"
                                rows="3" spellcheck="false">
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="comment-content">Proof of workdone (Url/Photos)</label>
                    <textarea   placeholder="Enter url or screenshots"
                                style="resize: vertical"
                                id="comment-content"
                                name="url"
                                class="form-control autosize-target text-left"
                                rows="2" spellcheck="false">
                    </textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>

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