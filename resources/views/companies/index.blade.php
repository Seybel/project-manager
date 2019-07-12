@extends('layouts.app')

@section('content')
<div class="col-md-6 col-lg-6 offset-md-3 offset-lg-3 mt-4">
    <div class="card text-white bg-primary" style="width: 35rem;">
        <h6 class="card-title mt-2 ml-4">Companies <a class="btn btn-primary btn-sm" style="margin-left: 350px" href="/companies/create">Create new</a></h6>

        <ul class="list-group">
            @foreach($companies as $company)

            <li class="list-group-item"><a href="/companies/{{ $company->id }}"> {{ $company->name }}</a></li>

            @endforeach
        </ul>

    </div>
</div>

@endsection