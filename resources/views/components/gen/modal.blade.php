@php($model = $attributes->get('wire:model'))

<div
    x-cloak
    x-show="$wire.{{$model}}"
    x-dialog:overlay x-transition.opacity
    class="fixed inset-0 bg-black/25">
</div>

<div
    x-cloak
    tabindex="-1"
    x-show="$wire.{{$model}}"
    x-transition.in
    x-transition.out
    class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50
    justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
>

    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative rounded-lg shadow bg-stone-900">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold">
                    @isset($title)
                        {{ $title }}
                    @endisset
                </h3>
                <button
                    wire:click="set('{{$model}}', false)"
                    type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                {{$slot}}
            </div>
        </div>
    </div>
</div>


