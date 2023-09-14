@extends('layout.partials')

@section('content')

 <div class="card">
    <div class="card-body">
        <h5 class="card-title">Finaliser la commande</h5>
        <form method="POST" action="{{route("order.store")}}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Adresse de livraison</label>
              <input type="text" name="address"  value="{{ old("address") }}" class="form-control" id="address">
              @error("address")
              <div class="text-danger">{{ $message }}</div>
              @enderror
              <label for="exampleInputEmail1" class="form-label">Numero de telephone</label>
              <input type="number" name="tel" value="{{ old("tel") }}" class="form-control" id="tel" placeholder="+221">
              @error("tel")
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Finaliser</button>
          </form>
    </div>
 </div>

@endsection