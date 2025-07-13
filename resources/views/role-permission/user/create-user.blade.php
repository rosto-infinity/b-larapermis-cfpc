<x-app-layout>
    <div class="container mx-auto mt-6 space-y-4">
        @include('role-permission.message')
        @if ($errors->any())
            <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <!-- Carte principale -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden transition-colors duration-300">
            <!-- En-tête de carte -->
            <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700 flex gap-2 ">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Create Users</h4>
                <a href="{{ route('users.index') }}"
                    class="bg-blue-500 hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 text-white px-4 py-2 rounded transition-colors">
                    Back
                </a>
            </div>
            <!-- Contenu du tableau -->
            <div class="p-4">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="text" id="email" name="email"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="text" id="password" name="password"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                        <select name="roles[]" id="roles"
                            class="block w-full  mt-1 
                                    focus:ring
                                    focus:ring-blue-600
                                    border-gray-400
                                    "
                            focus:blue- multiple>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}"> {{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create
                        User</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
