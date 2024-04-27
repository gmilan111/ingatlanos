<x-mail::message>
# Tisztelt {{$agent}}!

Tájékoztatni szeretnénk, hogy {{$user->name}} nevű felhasználó kifizette a teljes árát a {{$data->id}}. sorszámú ingatlannak.<br>
Ára: {{number_format(($data->auction_price),0,'','.')}} Ft<br>
Felhasználó email címe: {{$user->email}}
<x-mail::button :url="$url">
Aukció megtekintése
</x-mail::button>

</x-mail::message>
