@extends('dashboard.layouts.index')

@section('content')
<div class="container-fluid px-4">
  <h1 class="mt-4">Resolved Reclamations</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Approved Reclamations</li>
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
                        <th>Resolved</th>
                        <th>Description</th>
                        <th>Date Resolved</th>
                        <th>Actions</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Commande Number</th>
                      <th>User Name</th>
                      <th>Departement</th>
                      <th>Resolved</th>
                      <th>Description</th>
                      <th>Date Resolved</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($resolvedReclamations as $resolvedReclamation)
                    <tr style="line-height: 40px;">
                        <td>{{$resolvedReclamation->commande->commande_number}}</td>
                        <td>{{$resolvedReclamation->user->name}}</td>
                        <td>{{$resolvedReclamation->user->departement->name}}</td>
                        <td>{{($resolvedReclamation->solved) ? 'true' : 'false'}}</td>
                        <td>{{$resolvedReclamation->description}}</td>
                        <td>{{$resolvedReclamation->updated_at}}</td>
                        <td><a href="{{ route('reclamation.show', $resolvedReclamation->id)}}" class="btn-warning btn btn-sm">Show</a></td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>

  </div>
</div>
@endsection
