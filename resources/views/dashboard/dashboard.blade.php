@extends('dashboard.layouts.index')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4"> Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <a class="text-reset" href="{{route('categorie.create')}}">Add Categorie</a>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white" href="{{route('categorie.index')}}">View All</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <a class="text-reset" href="{{route('article.create')}}">Add Article</a>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white" href="{{route('article.index')}}">View All</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <a class="text-reset" href="{{route('user.create')}}">Add User</a>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white" href="{{route('user.index')}}">View All</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">                    
                    <a class="text-reset" href="{{route('departement.create')}}">Add Departement</a>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white" href="{{route('departement.index')}}">View All</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Commandes Chart Latest Mounths
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Reclamtions Bar Chart Latest Mounths
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Article With Critical State
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>article</th>
                        <th>Categorie</th>
                        <th>Provider</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      <th>article</th>
                      <th>Categorie</th>
                      <th>Provider</th>
                      <th>Status</th>
                      <th>Quantity</th>
                      <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                  @foreach ($articles as $article)
                    <tr>
                      <td>{{$article->name}}</td>
                      <td>{{$article->categorie->name}}</td>
                      <td>{{$article->provider}}</td>
                      <td>
                        @if (($article->stock_realtime / $article->stock_max) * 100 <= 10)
                        <div class="progress">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: {{($article->stock_realtime / $article->stock_max) * 100 }}%" aria-valuenow="{{($article->stock_realtime / $article->stock_max) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>{{($article->stock_realtime / $article->stock_max) * 100 }}%
                        </div>
                         @elseif (($article->stock_realtime / $article->stock_max) * 100 >= 11)
                        <div class="progress">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: {{($article->stock_realtime / $article->stock_max) * 100 }}%" aria-valuenow="{{($article->stock_realtime / $article->stock_max) * 100 }}" aria-valuemin="0" aria-valuemax="100">{{($article->stock_realtime / $article->stock_max) * 100 }}%</div>
                        </div>  
                        @endif
                      </td>
                      <td>{{$article->stock_realtime}}</td>
                      <td class="text-center"><button class="btn btn-sm btn-warning">update</button> <button class="btn btn-sm btn-danger">delete</button></td>
                    </tr>                    
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection