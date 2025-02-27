
@props(["url" => "/"])

<a href="{{ $url }}" class="flex items-center space-x-3 rtl:space-x-reverse">
    <x-nav.icon />
    <x-text.title />
</a>
