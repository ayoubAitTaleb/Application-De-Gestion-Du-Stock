@extends('dashboard.layouts.index')

@section('content')
<div class="container-fluid px-4">
  <h1 class="mt-4">Rejected Commandes</h1>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active">All Rejected Commandes</li>
  </ol>
  <div class="card mb-4">
      <div class="card-body">
          DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
          <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
          .
      </div>
  </div>
  <div class="card mb-4">
      <div class="row">
          <div class="card-body col-9">
              <table id="datatablesSimple">
                  <thead>
                      <tr>
                        <th>Commande Number</th>
                        <th>User Name</th>
                        <th>Departement</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>Commande Number</th>
                        <th>User Name</th>
                        <th>Departement</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($rejectedCommandes as $commande)
                    <tr style="line-height: 40px;">
                        <td>{{$commande->commande_number}}</td>
                        <td>{{$commande->user->name}}</td>
                        <td>{{$commande->user->departement->name}}</td>
                        <td>{{$commande->created_at}}</td>
                        <td><a href="{{ route('commande.rejected.show', $commande->commande_number)}}" class="btn-warning btn btn-sm">Show</a></td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>

  </div>
</div>
@endsection
