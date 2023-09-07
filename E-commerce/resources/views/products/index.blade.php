@extends('layout.partials')

@section('content')

    @foreach ($products as $item)
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                   <strong class="d-inline-block mb-2 text-primary">
                    @foreach ($item->categories as $categorie)
                      {{$categorie->name}}
                    @endforeach
                </strong>
                <h3 class="mb-auto">{{$item->name}}</h3>
                <p class="card-text mb-auto">{{$item->subtitle}}</p>
                <strong class="mb-auto font-weight-bold">{{$item->getPrice()}}</strong>
                <a href="{{route('product.show',['slug' => $item->slug])}}" class="stretched-link btn btn-info">
                consulter le produit</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="/storage/{{$item->image}}" width="200" height="250" alt="">
            </div>
            </div>
        </div>  
    @endforeach

@endsection