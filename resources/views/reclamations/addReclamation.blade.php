@extends('dashboard.layouts.index')

@section('content')
<div class="col-lg-7 m-auto">
    <div class="card shadow-lg border-0 rounded-lg my-5">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">Create Relamation</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ url('reclamation') }}">
                @csrf
                <div class="mb-3">
                    <label for="departement_id" class="form-label">Choose Commande Number</label>
                    <select class="form-select form-control" name="commande_id">
                        <option selected>Open this select menu</option>
                        @foreach ($commande_numbers as $commande_number)
                            <option id="commande_id" value="{{$commande_number->id}}">{{$commande_number->commande_number}}</option>
                        @endforeach
                        @error('commande_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </select>
                </div>
                <div class="mb-3">
                    <div class="col-md">
                        <div class="form-floating mb-3 mb-md-0">
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" placeholder="name" autofocus>
                            <label for="description">Description</label>
                        </div>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Reclamation</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
