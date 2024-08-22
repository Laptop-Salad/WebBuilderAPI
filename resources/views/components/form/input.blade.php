@props([
    'type' => 'text',
    'required' => false,
])

@php
    $wire = $attributes->wire('model')->value;
@endphp

<div class="flex flex-col">
    <label class="rounded-t-md text-black text-lg bg-ws-green p-2 inline-flex"
           id="{{$attributes->get('id')}}">
        @if ($required)
            <span class="text-red-500">*</span>
        @endif
        {{$slot}}
    </label>

    <input
        {{$attributes->merge(
          [
              'class' => 'bg-transparent text-ws-green border border-ws-green p-1 rounded-b-md
              rounded-x-md text-lg'
          ])}}
        type="{{$type}}" @required($required)>

    @error($wire) <p class="my-4 text-red-500 text-sm">{{$message}}</p> @enderror
</div>
