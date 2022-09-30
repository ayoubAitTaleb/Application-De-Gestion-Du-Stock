@extends('dashboard.layouts.index')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Categorie</h3></div>
        <div class="card-body">
          <form method="POST" action="{{ url('categorie') }}">
            @csrf            
              <div class="form-floating mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="categorie name" autofocus>
                <label for="name">categorie name</label>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>            
            <div class="mt-4 mb-0">
              <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Categorie</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>  
@endsection