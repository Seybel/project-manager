@extends('layouts.app')

@section('content')

<div class="row col-md-9 col-lg-9 col-sm-9 mt-4 pull-left">

    <!-- Example row of columns -->
    <div class="col-md-12 col-lg-12 col-sm-12 bg-white">

        <form method="post" action="{{ route('companies.update', [$company->id]) }}">
                    {{ csrf_field() }}

            <input type="hidden" name="_method" value="put">

            <div class="form-group">
                <label for="company-name">Name<span class="required" style="color: #8b0000">*</span></label>
                <input  placeholder="Enter company name"
                        id="company-name"
                        required 
                        name="name"
                        spellcheck="false"
                        class="form-control"
                        value="{{ $company->name }}" 
                />
            </div>

            <div class="form-group">
                <label for="company-content">Description</label>
                <textarea   placeholder="Enter description"
                            style="resize: vertical" 
                            id="company-content"
                            name="description" 
                            class="form-control autosize-target text-left"
                            rows="5" spellcheck="false">
                            {{$company->description}}</textarea>
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
            <li><a href="/companies/{{ $company->id }}">View companies</a></li>
            <li><a href="/companies">All companies</a></li>
        </ol>
    </div>

</div>

@endsection