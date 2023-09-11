
@section('title','Liste des produits')
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Detail commande') }}
        </h2>
    </x-slot>
    
    <div class="py-12 m-10">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">
            <div class="px-5 py-5 mb-5 bg-white white:bg-gray-800   overflow-hidden shadow-sm sm:rounded-lg w-full">
                <div class="w-auto">
                    <h1 class="font-bold mb-2">Commande N° {{$order->id}}</h1>
                    <span class="block font-light mb-2" >2 Article</span>
                    <p class="block font-light mb-2" >Effectuer  le  {{$order->getDate()}} </p>
                    <span class="block font-light mb-2" >Montant : {{getPrice($order->amounts)}} FCFA</span>
                </div>
           </div>
           @forelse ($order->detailOrder as $oneOrder)
                <div class="flex justify-between px-5 py-5 mb-5 bg-white white:bg-gray-800   overflow-hidden shadow-sm sm:rounded-lg w-full">
                    <div class="flex justify-between w-auto">
                        <div class="w-56 h-56">
                            <img class="w-full h-full objet-cover rounded-lg" src="/storage/{{$oneOrder->product->image}}">
                        </div>
                        <div class="block ml-10 max-w-2xl">
                            <h3 class="font-bold mb-2" >{{$oneOrder->product->name}}</h3>
                            <h3 class="font-light mb-2">Quantite : {{$oneOrder->quantity}}</h3>
                            <h3 class="font-semibold mb-2 text-dark">{{getPrice($oneOrder->product->price)}} FCFA</h3>
                            <h5 class="font-light mb-2 text-dark" >Commnde N°{{$order->id}}</h5>
                            <p class="text-gray-500 mb-3">
                                {{$oneOrder->product->subtitle}}
                            </p>
                            @if ($order->order_statut == "en cours")
                              <span class="bg-blue-100 text-white-800 text-sm font-bold mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-white">Commande effectuer</span>
                            @endif
                            @if ($order->order_statut == "en attente de confirmation")
                            <span class="bg-blue-100 text-white-800 text-sm font-bold mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-white">en attente de confirmation</span>
                            @endif
                            @if ($order->order_statut == "en attende d'expedtion")
                            <span class="bg-blue-100 text-white-800 text-sm font-bold mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-white">en attende d'expedtion</span>
                            @endif
                        </div>
                    </div>
                    <div class="right">
                         <form action="{{route("order.cancel",["id" => $oneOrder->id])}}" method="post">
                            @csrf
                            <button class="block mb-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                                Annuler la commande
                            </button>
                         </form>
                       <a href="" class="block bg-blue-500 text-center hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tracker</a>
                    </div>
               </div>
           @empty
               
           @endforelse
        </div>
    </div>
</x-app-layout>







    