<x-mail::message>
# Tisztelt {{$user->name}}!

Örömmel tájékoztatjuk, hogy sikeresen megvásárolta {{$data->settlement}}i ingatlant.<br>
Ára: {{number_format(($data->auction_price),0,'','.')}} Ft<br>
<br>
Hamarosan Kollégánk fel fogja venni Önnel a kapcsolatot!
<x-mail::button :url="$url">
Ingatlan megtekintése
</x-mail::button>

Köszönettel,<br>
Otthonvadász csapata
</x-mail::message>
