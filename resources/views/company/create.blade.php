<x-layouts.layout>
    <div class="max-w-6xl flex flex-col space-y-3 mx-auto p-6">
        <div class="flex justify-between items-center mb-14">
            <div class="flex space-x-4 items-center">
                <x-bladewind.button.circle color="orange" icon="arrow-left" size="tiny" onclick="window.location.href='{{ url('/index') }}'"/>
                <h1 class="font-medium text-2xl">Create New Company</h1>
            </div>
            
            <a href="{{ route('index.store') }}"
                class="py-3 px-4 inline-flex items-center bg-orange-500 gap-x-2 text-sm rounded-lg border border-transparent text-white hover:bg-orange-600 focus:outline-none focus:bg-orange-600 transition-all duration-300 uppercase"
                onclick="event.preventDefault(); document.getElementById('create-form').submit();">
                    Save
            </a>
        </div>
        <form id="create-form" action="{{ route('index.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="w-full grid grid-cols-2 gap-y-10 gap-x-4 items-center">
                <div class="flex flex-col space-y-2">
                    <label for="email">Name:</label>
                    <x-bladewind.input
                        name="name"
                        placeholder="Enter company name"
                        required
                        prefix="building-office"
                        prefix_is_icon="true"
                        value="{{ old('name') }}" 
                        class="focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('name') ? 'border-red-500' : '' }}" />
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="email">Email Address:</label>
                    <x-bladewind.input
                        name="email"
                        placeholder="Enter company email"
                        required
                        prefix="envelope"
                        prefix_is_icon="true"
                        value="{{ old('email') }}" 
                        class="focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('email') ? 'border-red-500' : '' }}" />
                    @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="email">Logo:</label>
                    <input type="file"
                        name="logo"
                        class="w-full border border-gray-300 rounded text-sm focus:ring-1 focus:ring-orange-500 focus:outline-none
                        file:bg-gray-200 file:border-0
                        file:me-4
                        file:py-3 file:px-4
                        {{ $errors->has('logo') ? 'border-2 border-red-500' : 'focus:border-orange-500' }}">

                    @error('logo')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="email">Website:</label>
                    <x-bladewind.input
                        name="website"
                        prefix="link"
                        prefix_is_icon="true"
                        placeholder="Enter company website"
                        required
                        value="{{ old('website') }}" 
                        class="focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('website') ? 'border-red-500' : '' }}" />
                    @error('website')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
            </div>
        </form>
    </div>
</x-layouts.layout>

<script>
    console.log('hello world')
</script>