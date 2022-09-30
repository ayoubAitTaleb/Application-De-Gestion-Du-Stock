@extends('dashboard.layouts.index')

@section('content')
<div class="container-fluid px-4">
  <h1 class="mt-4"> Dashboard</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Stock</li>
  </ol>
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-print me-1"></i>Print Rapport
    </div>
    <form action="{{route('stock.summary')}}" method="post">
      @csrf
      <div class="card-body row">
        <div class="col-md-5">
          <div class="form-floating mb-3 mb-md-0">
              <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" required placeholder="enter start date">
              <label for="start_date">Start Date</label>
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-floating mb-3 mb-md-0">
              <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" required placeholder="enter end date">
              <label for="end_date">End Date</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-floating mt-2 mb-md-0">
            <button type="submit" class="btn btn-sm btn-info" name="action" value="summaryCommandesPDF">print rapport</button>
            <button type="submit" class="btn btn-sm btn-success mt-2" name="action" value="summaryCommandes">show rapport</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="card mb-4">
      <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Commande Rapport List
      </div>
      <div class="card-body">
          <table id="datatablesSimple">
              <thead>
                  <tr>
                    <th>Commande Number</th>
                    <th>User</th>
                    <th>Departement</th>
                    <th>Approved</th>
                    <th>Creation Date</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th>Commande Number</th>
                    <th>User</th>
                    <th>Departement</th>
                    <th>Approved</th>
                    <th>Creation Date</th>
                  </tr>
              </tfoot>
              <tbody>
                @foreach ($commandes_rapport as $commande_rapport)
                  <tr>
                    <td>{{$commande_rapport->commande_number}}</td>
                    <td>{{$commande_rapport->user->name}}</td>
                    <td>{{$commande_rapport->user->departement->name}}</td>                   
                    <td>{{$commande_rapport->approved}}</td>                   
                    <td>{{$commande_rapport->created_at}}</td>                   
                @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>
@endsection