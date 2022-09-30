@extends('dashboard.layouts.index')

@section('content')
<div class="col-lg-7 m-auto">
    <div class="card shadow-lg border-0 rounded-lg my-5">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">Create Article</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ url('article') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col-md">
                        <div class="form-floating mb-3 mb-md-0">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="name" autofocus>
                            <label for="name">Name</label>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input id="provider" type="text" class="form-control @error('provider') is-invalid @enderror" name="provider" value="{{ old('provider') }}" required autocomplete="provider" placeholder="name" autofocus>
                            <label for="provider">Provider</label>
                        </div>
                        @error('provider')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" placeholder="price" autofocus>
                            <label for="price">Price</label>
                        </div>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-floating mb-3 mb-md-0">
                            <input id="stock_max" type="number" class="form-control @error('stock_max') is-invalid @enderror" name="stock_max" value="{{ old('stock_max') }}" required autocomplete="stock_max" placeholder="stock maximum" autofocus>
                            <label for="stock_max">Stock Max</label>
                        </div>
                        @error('stock_max')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3 mb-md-0">
                            <input id="stock_min" type="number" class="form-control @error('stock_min') is-invalid @enderror" name="stock_min" value="{{ old('stock_min') }}" required autocomplete="stock_min" placeholder="stock_min" autofocus>
                            <label for="stock_min">Stock Min</label>
                        </div>
                        @error('stock_min')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3 mb-md-0">
                            <input id="stock_realtime" type="number" class="form-control @error('stock_realtime') is-invalid @enderror" name="stock_realtime" value="{{ old('stock_realtime') }}" required autocomplete="stock_realtime" placeholder="stock_realtime" autofocus>
                            <label for="stock_realtime">Stock RealTime</label>
                        </div>
                        @error('stock_realtime')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="categorie_id" class="form-label">Choose Categorie</label>
                    <select class="form-select form-control" name="categorie_id">
                        <option selected>Open this select menu</option>
                        @foreach ($categorie as $categories)
                            <option id="categorie_id" value="{{$categories->id}}">{{$categories->name}}</option>
                        @endforeach
                        @error('categorie_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </select>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Article</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
