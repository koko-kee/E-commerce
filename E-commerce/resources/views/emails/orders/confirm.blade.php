<x-mail::message>
# Bonjour monsieur {{$user->name}}

veuillez confirmez votre commande shopping N°{{$orders->id}}
dans les deux prochains heure en cliquand sur ce bouton
<x-mail::button :url="''">
confirmez votre commande
</x-mail::button>

Merci pour vos achat<br>
</x-mail::message>
