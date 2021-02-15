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
                        Edit Permission
                    </div>
                    <a
                        href="{{ route('permission.index') }}"
                        class="bg-transparent border border-gray-500 hover:border-indigo-500
                        text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full focus:outline-none"
                    >
                        Permission List
                    </a>
                </div>
                <div class="flex justify-center p-5">
                    <form action="{{ route('permission.update', $permission->id) }}" method="post" class="w-1/3">
                        @csrf
                        @method('put')
                        <div class="flex flex-col mt-5 mb-4 md:w-full">
                            <label class="mb-2 font-bold text-md text-gray-500 text-grey-darkest" for="name">Enter Permission</label>
                            <input class="border border-gray-300 py-2 px-3 text-grey-darkest" type="text" name="name" id="name" value="{{ $permission->name }}">
                        </div>

                        <div class="flex justify-end pt-5">
                            <button type="button" class="modal-close px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Close</button>
                            <button type="submit" class="px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

