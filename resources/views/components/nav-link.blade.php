@props(['title' => '','active' => false,])
<a {{$attributes}}
    class="px-3 py-2 rounded-lg text-sm font-medium transition
    {{ $active ? 'bg-green-100 text-green-700' : 'text-gray-600 hover:bg-gray-100 hover:text-green-700'}}"
    aria-current="$active ? 'page' : false}}">
    {{$slot}} </a>
