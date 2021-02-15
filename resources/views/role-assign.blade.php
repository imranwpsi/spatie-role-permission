<x-app-layout>
    <style>
        input:checked + svg {
            display: block;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">User Wise Assign Role</p>
                </div>
                <form action="{{ url('admin/role-assign') }}" id="userForm">
                    <div class="flex flex-col mt-5 mb-4 md:w-full">
                        <label class="mb-2 font-bold text-md text-gray-500 text-grey-darkest" for="roleSelect">Select Role</label>
                        <select class="border border-gray-300 py-2 px-3 text-grey-darkest" name="user_id" id="roleSelect" onchange="this.form.submit()">
                            <option value="">Select User</option>
                            @foreach($users as $id => $name)
                                <option value="{{ $id }}" @if(Request::get('user_id') == $id) selected @endif>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <form action="{{ url('admin/role-assign') }}" method="post" id="roleForm">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ Request::get('user_id') }}">
                    <div class="grid grid-cols-2">
                        @foreach($roles as $role)
                            <label class="flex justify-start items-start mb-3">
                                <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                    <input
                                        type="checkbox"
                                        class="opacity-0 absolute"
                                        name="roles[{{ $role->name }}]"
                                        @if(in_array($role->id, $selected_roles)) checked @endif
                                    >
                                    <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </div>
                                <div class="select-none">{{ $role->name }}</div>
                            </label>
                        @endforeach
                    </div>

                    <!--Footer-->
                    <div class="flex justify-end pt-5">
                        <button
                            type="button"
                            class="modal-close px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2"
                            onclick="resetForm()"
                        >
                            Reset
                        </button>
                        <button type="submit" class="px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function resetForm() {
            document.getElementById("userForm").reset();
            document.getElementById("roleForm").reset();
        }

    </script>
</x-app-layout>
