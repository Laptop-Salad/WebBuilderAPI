<div class="text-ws-green flex h-full flex-col items-center justify-center">
    <h1 class="text-3xl font-bold mb-8">Login</h1>

    <form
        wire:submit="login"
        class="flex flex-col justify-center border-2 border-ws-green p-5 w-full md:w-1/2 rounded-md space-y-8"
    >
        <x-form.input wire:model="email" type="email" required>Email</x-form.input>
        <x-form.input wire:model="password" type="password" required>Password</x-form.input>

        <x-gen.btn type="submit">Login</x-gen.btn>
    </form>
</div>
