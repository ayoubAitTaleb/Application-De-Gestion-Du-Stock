@extends('dashboard.layouts.index')

@section('content')
<div class="container-fluid px-4">
  <h1 class="mt-4">Show Commande</h1>
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
                        <th>Article Name</th>
                        <th>Quantity</th>
                        <th>Date Created</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>Commande Number</th>
                        <th>Article Name</th>
                        <th>Quantity</th>
                        <th>Date Created</th>
                      </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($commande as $commandes)
                      <tr style="line-height: 40px;">
                          <td>{{$commandes->commande_number}}</td>
                          <td>{{$commandes->article_name}}</td>
                          <td>{{$commandes->quantity}}</td>
                          <td>{{$commandes->created_at}}</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              <div class="row">
                  <div class="col-md-4">
                    <form action="{{route('commande.approve', $commande_number_index->commande_number)}}" method="POST">
                        @csrf
                        {{ method_field('PATCH') }}
                        <button type="submit" class="btn btn-success btn-sm">Approved Commande</button>
                    </form>
                  </div>
                  <div class="col-md-4">
                      <form action="{{route('commande.reject', $commande_number_index->commande_number)}}" method="POST">
                        @csrf
                        {{ method_field('DELETE')}}
                        <button type="submit" class="btn btn-sm btn-danger">reject commende</button>
                      </form>
                  </div>
                  <div class="col-md-4">
                      <a href="{{route('commande.approvedCommandePDF', $commande_number_index->commande_number)}}" class="btn btn-sm btn-warning">generate PDF</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection