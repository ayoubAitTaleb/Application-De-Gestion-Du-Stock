@extends('dashboard.layouts.index')
@section('content')
<div class="container-fluid px-4">
  <h1 class="mt-4">Approved Commande</h1>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active">Show Commande</li>
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
                        <th>Article Name</th>
                        <th>Quantity</th>
                        <th>Date Created</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Commande Number</th>
                      <th>User Name</th>
                      <th>Article Name</th>
                      <th>Quantity</th>
                      <th>Date Created</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($commande as $commandes)
                        <tr style="line-height: 40px;">
                          <td>{{$commandes->commande_number}}</td>
                          <td>{{$commandes->user->name}}</td>
                          <td>{{$commandes->article_name}}</td>
                          <td>{{$commandes->quantity}}</td>
                          <td>{{$commandes->created_at}}</td>
                        </tr>
                      @endforeach
                  </tbody>
              </table>
              <div class="row">
                <div class="col-md-6">
                  <a href="{{ route('commande.restore', $commande_number_index->commande_number)}}" class="btn btn-success btn-sm">restore commande</a>
                </div>
                <div class="col-md-6">
                    <a href="{{route('commande.approvedCommandePDF', $commande_number_index->commande_number)}}" class="btn btn-sm btn-warning">generate PDF</a>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection