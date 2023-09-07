@extends('layout.partials')

@section('content')

        <div class="col-12">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">Categorie 1</strong>
                <h3 class="mb-auto">{{$product->name}}</h3>
                <p class="card-text mb-auto">{{$product->subtitle}}</p>
                <strong class="mb-auto">{{$product->getPrice()}}</strong>
                <form action="{{route('cart.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <button type="submit" class="btn btn-dark"> <i class="fa-solid fa-bag-shopping"></i> Ajouter au panier</button>
                </form>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="/storage/{{$product->image}}" width="200" height="250" alt="">
            </div>
            </div>
        </div>  

@endsection