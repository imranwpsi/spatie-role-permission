<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                    <div class="text-2xl">
                        Role Wise Permission List
                    </div>
                    <a
                        href="{{ url('admin/role-permission') }}"
                        class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500
                        text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full focus:outline-none"
                    >
                        + Assign Permission
                    </a>
                </div>

                @forelse($roles as $role)

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-4 @if($loop->iteration > 1) border-t border-gray-200 @endif">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laravel.com/docs">{{ $role->name }}</a></div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l col-span-3 grid grid-cols-4">
                        @foreach($role->permissions as $permission)
                        <div class="roles">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 text-green-500 inline">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            {{ $permission->name }}
                        </div>
                        @endforeach
                    </div>
                </div>
                @empty
                    No Data Found
                @endforelse

            </div>
        </div>
    </div>

</x-app-layout>

