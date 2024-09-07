@props(['active'])

<button
    {{$attributes}}

    @class([
        'text-stone-900 bg-ws-green pt-4' => $active,
        'hover:pt-4 hover:mt-0 mt-4' => !$active,
        'py-2 rounded-t border-x border-t border-ws-green hover:bg-ws-green hover:text-stone-900 text-lg px-6 mt-4',
    ])
>
    {{$slot}}
</button>
