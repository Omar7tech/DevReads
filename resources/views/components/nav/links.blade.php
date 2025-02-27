<x-nav.link label="Home" url="{{ route('home') }}" isActive="{{ request()->routeIs('home') }}" />
<x-nav.link label="About" url="{{ route('about') }}" isActive="{{ request()->routeIs('about') }}" />
