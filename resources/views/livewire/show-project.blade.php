<div class="my-6">
   <div class="flex space-x-4">
       <h1>{{$this->project->name}}</h1>
       <x-gen.btn wire:click="save">Save</x-gen.btn>
   </div>

    <div class="border-b py-4">
        @foreach($this->contents as $page => $content)
            <x-gen.btn wire:click="$set('current_page', '{{$page}}')">{{$page}}</x-gen.btn>
        @endforeach
    </div>

    <div class="grid grid-cols-[1fr_6fr] p-5">
        <div class="px-2 border-s space-y-2 text-xl m-2">
            <x-gen.btn wire:click="addPage">New Page</x-gen.btn>
            <x-gen.btn>T</x-gen.btn>
        </div>

        @isset($this->current_page)
            <div class="bg-white text-black h-[100vh]">
                @foreach($this->children as $child)
                    {!! $child !!}
                @endforeach
            </div>
        @endisset
    </div>
</div>
