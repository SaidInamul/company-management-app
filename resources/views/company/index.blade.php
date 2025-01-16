<x-layouts.layout>
    <div class="max-w-6xl flex flex-col space-y-3 mx-auto p-6">
        <div>
            <a href="{{ route('index.create') }}" class="py-3 px-4 inline-flex items-center bg-orange-500 gap-x-2 text-sm rounded-lg border border-transparent text-white hover:bg-orange-600 focus:outline-none focus:bg-orange-600 transition-all duration-300 uppercase">Create Company</a>
        </div>
        <div class="w-full relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Website
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $index => $company)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-3 flex gap-x-5 items-end w-56 h-20">
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="h-8 w-8 object-cover">
                            {{ $company->name }}
                        </td>
                        <td class="px-6 py-3 w-56 h-20">{{ $company->email }}</td>
                        <td class="px-6 py-3 h-20">{{ $company->website_link }}</td>
                        <td class="px-6 py-3 flex gap-x-2 h-20 items-start justify-center">
                            <!-- Add your action buttons here, e.g., edit, delete -->
                            <a href="{{ route('index.edit', $company->id) }}"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-xs rounded-lg border border-transparent text-orange-600 hover:bg-orange-200 focus:outline-none focus:bg-orange-200 transition-all duration-300 uppercase">Edit</a>
                            <a href="{{ route('index.destroy', $company->id) }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs rounded-lg border border-transparent text-red-600 hover:bg-red-200 focus:outline-none focus:bg-red-200 transition-all duration-300 uppercase" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $company->id }}').submit();">Delete</a>
                            <form id="delete-form-{{ $company->id }}" action="{{ route('index.destroy', $company->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4"> {{ $companies->links() }} </div>
    </div>
</x-layouts.layout>
