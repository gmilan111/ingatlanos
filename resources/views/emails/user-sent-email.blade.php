<x-mail::message>
# Új üzenet!

Felhasználó: {{$data['name']}}

# Üzenet

{{$data['description']}}

<x-mail::button :url="$url">
    Ugrás az ingatlanhoz
</x-mail::button>
</x-mail::message>
