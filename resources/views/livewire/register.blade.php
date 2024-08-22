<div class="text-ws-green min-h-screen flex flex-col items-center justify-center">
    <h1 class="text-3xl font-bold mb-8">Register</h1>

    <form
        wire:submit="register"
        class="flex flex-col justify-center border-2 border-ws-green p-5 min-h-[60vh] w-full md:w-1/2
    rounded-md space-y-8">
        <x-form.input wire:model="name" required>Name</x-form.input>
        <x-form.input wire:model="email" type="email" required>Email</x-form.input>
        <x-form.input wire:model="password" type="password" required>Password</x-form.input>
        <x-form.input wire:model="password_confirmation" type="password" required>Confirm Password</x-form.input>
        <x-gen.btn type="submit">Register</x-gen.btn>
    </form>
</div>
