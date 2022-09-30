@extends('dashboard.layouts.index')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">All Articles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">All Articles</li>
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
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link @if($tab == 'all') active @endif"  href="{{route('commande.create')}}">all categories <i class="fas fa-sort-down"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if($tab == 'informatique') active @endif" href="{{route('commande.create.informatique')}}">informatique <i class="fas fa-sort-down"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if($tab == 'bureau') active @endif"  href="{{route('commande.create.bureau')}}">bureau <i class="fas fa-sort-down"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if($tab == 'maintenance') active @endif" href="{{route('commande.create.maintenance')}}">maintenance <i class="fas fa-sort-down"></i></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="card-body col-9">
                @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <table id="datatablesSimple">
                    @if (session()->has('status'))
                    <div class="alert alert-danger" role="alert">
                        {{session()->get('status')}}
                      </div>
                    @endif
                    <thead>
                        <tr>
                            <th>Article</th>
                            <th>Provider</th>
                            <th>Quantity Availlable</th>
                            <th>Categorie</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Article</th>
                            <th>Provider</th>
                            <th>Quantity Availlable</th>
                            <th>Categorie</th>
                            <th>Quantity</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($article as $articles)
                        <tr style="line-height: 40px;">
                            <td>{{$articles->name}}</td>
                            <td>{{$articles->provider}}</td>
                            <td>{{$articles->stock_realtime}}</td>
                            <td>{{$articles->categorie->name}}</td>
                            <td class="text-center">
                                <form action="{{ route('list.add') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $articles->id }}" id="id" name="id">
                                    <input type="hidden" value="{{ $articles->name }}" id="name" name="name">
                                    <input type="hidden" value="{{ $articles->price }}" id="price" name="price">
                                    <input type="number" class="form-control" placeholder="quantity" min="1" id="quantity" name="quantity">
                                    <button type="submit" class="btn btn-sm btn-success">select</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-3">
                <div class="card my-3 mx-2">
                    <div class="card-header">
                      Article Selected
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($articleList as $articlesList)
                        <div class="list-group-item-action list-group-item d-flex justify-content-between align-items-center">
                          <a href="" class="text-left">{{$articlesList->name}}</a><span class="text-right">{{$articlesList->quantity}}</span>
                        </div>                            
                        @endforeach
                    </ul>
                    <div class="card-footer">
                        <form action="{{route('commande.store')}}" method="POST">
                            {{ csrf_field() }}
                            @foreach ($articleList as $articlesList)
                                <input type="hidden" value="{{ $articlesList->id }}" id="id" name="id[]">
                                <input type="hidden" value="{{ Auth::user()->id}}" id="user_id" name="user_id[]">
                                <input type="hidden" value="{{ $articlesList->name }}" id="article_name" name="article_name[]">
                                <input type="hidden" value="{{ $articlesList->price }}" id="price" name="price[]">
                                <input type="hidden" id="quantity" value="{{ $articlesList->quantity }}" class="form-control" placeholder="quantity" name="quantity[]">
                            @endforeach
                                <input type="hidden" value="{{ rand(0, 999999999999) }}" id="commande_number" name="commande_number">
                            <button type="submit" class="btn btn-sm btn-info">confirm order</button>
                        </form>
                    </div>
                  </div>
            </div>
        </div>

    </div>
</div>
@endsection
