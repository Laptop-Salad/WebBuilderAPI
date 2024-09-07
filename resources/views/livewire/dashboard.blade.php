<div class="mt-10">
    <h2 class="text-3xl font-bold">Hi, {{auth()->user()->name}}</h2>

    <x-gen.btn class="mt-4" wire:click="$set('show_create_project', true)">Create Project</x-gen.btn>

    <div class="my-4">
        @foreach($this->projects as $project)
            <a href="{{route('project', $project->id)}}">{{$project->name}}</a>
        @endforeach
    </div>

    {{$this->projects->links()}}

    <x-gen.modal wire:model="show_create_project">
        <x-slot:title>Create New Project</x-slot:title>

        <form wire:submit="createProject" class="space-y-2">
            <x-form.input wire:model="name" required>Name</x-form.input>

            <x-gen.btn type="submit">Create</x-gen.btn>
        </form>
    </x-gen.modal>
</div>
