<x-mail::message>
# Bonjour monsieur {{$user->name}}

veuillez confirmez votre commande shopping N°{{$orders->id}}
dans les deux prochains heure en cliquand sur ce  lien
<a href="{{route("order.confirm",["id" => $orders->id])}}">confirmer la commande</a>
Merci pour vos achat<br>
</x-mail::message>
