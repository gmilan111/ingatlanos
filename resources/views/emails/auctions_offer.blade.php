<x-mail::message>
# Aukció<br>
Új ajánlat érkezett a(z) {{$data->id}}. számú ingatlanra.<br>
Ajánlat: {{number_format(($data->auction_price),0,'','.')}} Ft<br>
Felhasználó: {{$user->name}}<br>
Felhasználó email címe: {{$user->email}}
<x-mail::button :url="$url">
Aukció megtekintése
</x-mail::button>

</x-mail::message>
