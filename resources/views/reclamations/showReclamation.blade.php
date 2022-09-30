@extends('dashboard.layouts.index')

@section('content')
<div class="container-fluid px-4">
  <h1 class="mt-4">Show Reclamation</h1>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active">Show Reclamation</li>
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
                        <th>Reclamaion Number</th>
                        <th>Description</th>
                        <th>User Name</th>
                        <th>Commande number</th>
                        <th>Solved</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>Reclamaion Number</th>
                        <th>Description</th>
                        <th>User Name</th>
                        <th>Commande number</th>
                        <th>Solved</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    <tr style="line-height: 40px;">
                      <td>{{$reclamation->id}}</td>
                      <td>{{$reclamation->description}}</td>
                      <td>{{$reclamation->user->name}}</td>
                      <td>{{$reclamation->commande->commande_number}}</td>
                      <td>{{($reclamation->solved) ? 'true' : 'false'}}</td>
                    </tr>
                  </tbody>
              </table>
              <div class="row">
                <div class="col-md-4">
                  <form method="POST" action="{{route('reclamation.update', $reclamation->id)}}">
                      @csrf
                      {{ method_field('PATCH') }}
                      <button type="submit" class="{{$reclamation->solved ? 'btn btn-success btn-sm disabled' : 'btn btn-success btn-sm'}}">Solve Reclamation</button>
                  </form>
                </div>                    
                  <div class="col-md-4">
                      <form method="POST" action="{{route('reclamation.destroy', $reclamation->id)}}">
                        @csrf
                        {{ method_field('DELETE')}}
                        <button type="submit" class="{{$reclamation->deleted_at ? 'btn btn-sm btn-danger disabled' : 'btn btn-sm btn-danger'}}">reject Reclamation</button>
                      </form>
                  </div>
                  <div class="col-md-4">
                    <a href="{{route('reclamation.approvedReclamationPDF', $reclamation->id)}}" class="btn btn-sm btn-warning">generate PDF</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection