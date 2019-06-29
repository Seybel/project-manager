@extends('layouts.app')

@section('content')
<div class="col-md-6 col-lg-6 offset-md-4 offset-lg-4 mt-4">
    <div class="card text-white bg-primary" style="width: 18rem;">
        <h6 class="card-title mt-2 mx-auto">Companies</h6>

        <ul class="list-group">
            @foreach($companies as $company)

            <li class="list-group-item"><a href="/companies/{{ $company->id }}"> {{ $company->name }}</a></li>

            @endforeach
        </ul>

    </div>
</div>

@endsection