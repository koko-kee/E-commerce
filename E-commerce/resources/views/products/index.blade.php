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
                <h6 >{{$item->name}}</h6>
                <p class="text-secondary mb-auto">{{$item->subtitle}}</p>
                <span class="mb-auto text-secondary text-monospace fs-4 font-weight-light">{{$item->getPrice()}}</span>
                <a href="{{route('product.show',['slug' => $item->slug])}}" class="stretched-link btn btn-info text-light"><i class="fa-sharp fa-solid fa-paper-plane"></i> consulter le produit</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img  src="/storage/{{$item->image}}" width="200" height="250"  alt="">
            </div>
            </div>
        </div>  
    @endforeach
{{$products->links()}}
@endsection