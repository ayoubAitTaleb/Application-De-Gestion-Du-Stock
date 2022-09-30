@extends('dashboard.layouts.index')

@section('content')
<div class="container-fluid px-4">
  <h1 class="mt-4">Rejected Reclamations</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Rejected Reclamations</li>
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
                        <th>Date Rejected</th>
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
                      <th>Date Rejected</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($rejectedReclamations as $rejectedReclamation)
                    <tr style="line-height: 40px;">
                        <td>{{$rejectedReclamation->commande->commande_number}}</td>
                        <td>{{$rejectedReclamation->user->name}}</td>
                        <td>{{$rejectedReclamation->user->departement->name}}</td>
                        <td>{{($rejectedReclamation->solved) ? 'true' : 'false'}}</td>
                        <td>{{$rejectedReclamation->description}}</td>
                        <td>{{$rejectedReclamation->deleted_at}}</td>
                        <td>
                          <a href="{{route('reclamation.restore', $rejectedReclamation->id)}}" class="btn-success btn btn-sm">Restore</a>
                          <a href="{{route('reclamation.show', $rejectedReclamation->id)}}" class="btn-warning btn btn-sm">Show</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>

  </div>
</div>
@endsection
