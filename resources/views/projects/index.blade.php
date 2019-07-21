@extends('layouts.app')

@section('content')
<div class="col-md-6 col-lg-6 offset-md-3 offset-lg-3 mt-4">
    <div class="card text-white bg-primary" style="width: 35rem;">
        <h6 class="card-title mt-2 ml-4">Projects <a class="btn btn-primary btn-sm" style="margin-left: 350px" href="/projects/create">Create new</a></h6>

        <ul class="list-group">
            @foreach($projects as $project)

            <li class="list-group-item"><a href="/projects/{{ $project->id }}"> {{ $project->name }}</a></li>

            @endforeach
        </ul>

    </div>
</div>

@endsection