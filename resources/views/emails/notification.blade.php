<x-mail::message>
# Kedves {{$user_data->name}}!

Tájékoztatni szeretném, hogy új ingatlan lett közzétéve, ami lehet érdekli Önt.

# Ingatlan adatai:<br>
Település: {{$properties_data->settlement}}<br>
Vármegye: {{$properties_data->state}}<br>
Utca, házszám: {{$properties_data->address}}<br>
Szobák száma: {{$properties_data->rooms}}<br>
Fürdőszobák száma: {{$properties_data->bathrooms}}<br>
Ár: {{number_format(($properties_data->price),0,'','.')}} Ft<br>

<x-mail::button :url="$url">
Részletek megtekintése
</x-mail::button>

Köszönettel,<br>
{{ $agent->name }}<br>
{{ $agent->email }}<br>
{{ $agent->phone_number }}<br>
</x-mail::message>
