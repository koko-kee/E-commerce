@extends('layout.partials')

@section('content')

        <div class="col-12">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-300 position-relative">
                <div class="col p-4 d-flex flex-column position-static ">
                    <div class="d-flex align-items-center mb-3 ">
                        <span class=" d-block badge rounded-pill bg-info">{{$stock}}</span>
                        @foreach ($product->categories as $category)
                         <span style="margin-left: 10px" class="d-block  fw-bold text-primary">{{$category->name}}</span>
                        @endforeach
                    </div>
                    <h4 class="mb-3">{{$product->name}}</h4>
                    <p class="card-text mb-3">{{$product->description}}</p>
                    <span class="mb-auto text-secondary text-monospace fs-2">{{$product->getPrice()}}</span>
                    <form class="mt-3" action="{{route('cart.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-bag-shopping"> </i>  Ajouter au panier</button>
                    </form>
                </div>
                <div class="col-auto d-none d-lg-block ">
                    <img class="h-100" src="/storage/{{$product->image}}" width="200"  alt="">
                </div>
            </div>
        </div>  

@endsection