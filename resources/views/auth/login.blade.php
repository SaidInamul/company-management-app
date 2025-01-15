<x-layouts.layout>
    <div class="max-w-6xl flex flex-col items-center space-y-3 mx-auto p-6">
        <p class="font-semibold text-3xl text-center">Welcome back !</p>
        <p class="text-center text-gray-600">Please sign in your account here.</p>

        <form action="/" method="POST" class="w-1/2 pt-10 flex flex-col items-center space-y-6">
            @csrf
            <div class="space-y-2 w-full">
                <label for="email">Email:</label>
                <x-bladewind.input
                    name="email"
                    placeholder="Enter your email"
                    required
                    value="{{ old('email') }}" 
                    prefix_is_icon="true"
                    prefix="envelope"
                    class="focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('email') ? 'border-red-500' : '' }}" />
                    @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
            </div>

            <div class="space-y-2 w-full">
                <label for="email">Password:</label>
                <x-bladewind.input
                    name="password"
                    placeholder="Enter your password"
                    required
                    prefix_is_icon="true"
                    prefix='key'  
                    type="password"
                    viewable="true"
                    class="focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('password') ? 'border-red-500' : '' }}"  />
                    @error('password')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
            </div>

            <x-bladewind.button
                color="orange"
                has_spinner="true"
                show_spinner="false"
                class="w-full"
                has_spinner="true"
                can_submit="true">
                    Submit
            </x-bladewind.button>
        </form>

    </div>
</x-layout>