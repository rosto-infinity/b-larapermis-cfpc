<x-app-layout>
   
    <div class="container mx-auto mt-6 space-y-4">
       @include('role-permission.message')
        <!-- Carte principale -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden transition-colors duration-300">
            <!-- En-tête de carte -->
            <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                  Role : {{ $role->name }}
                </h4>
                
                <a href="{{ route('roles.index') }}" 
                   class="bg-red-500 hover:bg-red-600 dark:bg-red-700 dark:hover:bg-red-800 text-white px-4 py-2 rounded transition-colors">
                    Back to Role
                </a>

            </div>
            
         
            <div class="p-4">
                <form action="{{ url('roles/' . $role->id . '/give-permissions') }}" method="post">
                  @csrf
                  @method('PATCH')
                  <label for="name">Permissions</label>
                  <div class="grid grid-cols-4 gap-3 my-5">
                    @foreach ($permissions as $permission )
                    <div class="flex">
                      <label for="" class="flex"></label>
                      <input
                        type="checkbox"
                        name="permission[]"
                        value="{{ $permission->name }}"
                        {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                        class="h-4 w-4"
                        >
                      <span class="ml-2 text-gray-600" >{{ $permission->name }}</span>
                    </div>
                    @endforeach

                  </div>
                 <button type="submit"
                   class="bg-green-500 hover:bg-green-600 dark:bg-green-700 dark:hover:bg-green-800 text-white px-4 py-2 rounded transition-colors">
                    Update
                </button>
                </form>
            </div>
        </div>
    </div>

   
</x-app-layout>
