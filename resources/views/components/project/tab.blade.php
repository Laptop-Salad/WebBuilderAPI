<button
    {{
    $attributes->merge([
        'class' => 'py-2 rounded-t border-x border-t border-ws-green hover:bg-ws-green hover:text-stone-900 text-lg px-6'
    ])}}
>
    {{$slot}}
</button>
