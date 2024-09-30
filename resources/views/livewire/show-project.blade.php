<div class="my-6">
   <div class="flex space-x-4">
       <h1>{{$this->project->name}}</h1>
       <x-gen.btn wire:click="save">Save</x-gen.btn>
   </div>

    <div class="pt-4 mx-2">
        @foreach($this->pages as $page)
            <x-project.tab
                :active="$this->current_page?->id === $page->id"
                wire:click="setPage({{$page}})"
            >
                {{$page->name}}
            </x-project.tab>
        @endforeach
    </div>

    <div class="grid grid-cols-[1fr_5fr] border border-ws-green rounded-md">
        <div class="px-2 space-y-2 text-xl py-5 h-[100vh]">
            <x-gen.btn wire:click="addPage">New Page</x-gen.btn>
            <x-gen.btn wire:click="addText({{\App\Enums\Components\Text::p}})">T</x-gen.btn>

            @foreach(\App\Enums\Components\Text::cases() as $text)
                <x-gen.btn wire:click="addText({{$text}})">{{$text->humanName()}}</x-gen.btn>
            @endforeach
        </div>

        @isset($this->current_page)
            <div class="bg-white text-black h-[100vh] m-5">
                <div class="revert-all">
                    @foreach($this->current_page->deserialised_data as $child)
                        {!! $child->getHTML() !!}
                    @endforeach
                </div>
            </div>
        @endisset
    </div>
</div>
