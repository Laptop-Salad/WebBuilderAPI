<div class="my-6">
   <div class="flex space-x-4">
       <h1>{{$this->project->name}}</h1>
       <x-gen.btn wire:click="save">Save</x-gen.btn>
   </div>

    <div class="pt-4 mx-2">
        @foreach($this->contents as $page => $content)
            <x-project.tab
                :active="$this->current_page === $page"
                wire:click="$set('current_page', '{{$page}}')"
            >
                {{ucwords(str_replace('_', ' ', $page))}}
            </x-project.tab>
        @endforeach
    </div>

    <div class="grid grid-cols-[1fr_6fr] border border-ws-green rounded-md">
        <div class="px-2 space-y-2 text-xl py-5 h-[100vh]">
            <x-gen.btn wire:click="addPage">New Page</x-gen.btn>
            <x-gen.btn wire:click="addText">T</x-gen.btn>
        </div>

        @isset($this->current_page)
            <div class="bg-white text-black h-[100vh] m-5">
                @foreach($this->children as $child)
                    {!! $child !!}
                @endforeach
            </div>
        @endisset
    </div>
</div>
