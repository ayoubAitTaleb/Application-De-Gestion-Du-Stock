@extends('dashboard.layouts.index')
@section('content')
<div class="container-fluid px-4">
  <h1 class="mt-4">All Departement</h1>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item active">All Departement</li>
  </ol>
  <div class="card mb-4">
      <div class="card-body">
          DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
          <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
          .
      </div>
  </div>
  <div class="card mb-4">
      <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Departements Table
      </div>
      <div class="card-body">
          <table id="datatablesSimple">
              <thead>
                  <tr>
                      <th>Name</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>Family Name</th>
                  </tr>
              </tfoot>
              <tbody>
                @foreach ($departement as $departements)
                  <tr>
                    <td>{{$departements->name}}</td>
                  </tr>
                @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>
@endsection