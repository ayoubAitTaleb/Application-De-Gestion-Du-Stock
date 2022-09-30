@extends('dashboard.layouts.index')
@section('content')
<div class="container-fluid px-4">
  <h1 class="mt-4">All user</h1>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active">All user</li>
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
          users Table
      </div>
      <div class="card-body">
          <table id="datatablesSimple">
              <thead>
                  <tr>
                    <th>Name</th>
                    <th>Family Name</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Departements</th>
                    <th>created date</th>
                    <th>Actions</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Family Name</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Departements</th>
                    <th>created date</th>
                    <th>Actions</th>
                  </tr>
              </tfoot>
              <tbody>
                @foreach ($user as $users)
                  <tr style="line-height: 40px;">
                    <td>{{$users->name}}</td>
                    <td>{{$users->family_name}}</td>
                    <td>{{$users->email}}</td>
                    <td class="text-center">
                      <img class="rounded" src="{{asset('storage/' . $users->avatar)}}" style="height:50px; width:auto">
                    </td>
                    <td>{{$users->departement->name}}</td>
                    <td>{{$users->created_at}}</td>
                    <td class="text-center">
                      <button class="btn btn-sm btn-warning">update</button> 
                      <button class="btn btn-sm btn-danger">delete</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>
@endsection