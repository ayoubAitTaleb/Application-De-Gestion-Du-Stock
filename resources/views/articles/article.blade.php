@extends('dashboard.layouts.index')
@section('content')
<div class="container-fluid px-4">
  <h1 class="mt-4">All Articles</h1>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active">All articles</li>
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
          categories Table
      </div>
      <div class="card-body">
          <table id="datatablesSimple">
              <thead>
                  <tr>
                    <th>Name</th>
                    <th>Provider</th>
                    <th>Price</th>
                    <th>Stock Max</th>
                    <th>Stock Min</th>
                    <th>Stock RealTime</th>
                    <th>Categorie</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Provider</th>
                    <th>Price</th>
                    <th>Stock Max</th>
                    <th>Stock Min</th>
                    <th>Stock RealTime</th>
                    <th>Categorie</th>
                  </tr>
              </tfoot>
              <tbody>
                @foreach ($article as $articles)
                  <tr style="line-height: 40px;">
                    <td>{{$articles->name}}</td>
                    <td>{{$articles->provider}}</td>
                    <td>{{$articles->price}}</td>
                    <td>{{$articles->stock_max}}</td>
                    <td>{{$articles->stock_min}}</td>
                    <td>{{$articles->stock_realtime}}</td>
                    <td>{{$articles->categorie->name}}</td>
                  </tr>
                @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>
@endsection