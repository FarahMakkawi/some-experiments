<x-mail::message>

Welcom in MailTrap ..
product has been added successfully {{$product->name}}..

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
