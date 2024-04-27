<x-mail::message>
# Gratulálunk {{$user}}!

Ön sikeresen megvásárolta a(z) {{$property}}. sorszámú ingatlant.<br>
Ára: {{number_format(($price),0,'','.')}} Ft<br><br>
Kollégánk hamarosan fel fogja venni Önnel a kapcsolatot.
<x-mail::button :url="$url">
Ingatlan megtekintése
</x-mail::button>

Köszönettel,<br>
Otthonvadász csapata
</x-mail::message>
