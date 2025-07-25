<x-app-layout>
  
    <div class="container mx-auto mt-6 space-y-4">
       @include('role-permission.message')
        <!-- Carte principale -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden transition-colors duration-300">
            <!-- En-tête de carte -->
            <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700 flex gap-2 ">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Users</h4>
                <a href="{{ route('users.create') }}" 
                   class="bg-blue-500 hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 text-white px-4 py-2 rounded transition-colors">
                    Add User
                </a>
            </div>
            
            <!-- Contenu du tableau -->
            <div class="p-4">
               <table class="min-w-full border border-gray-300 dark:border-gray-600">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="border-b dark:border-gray-600 py-2 text-left px-4 text-gray-800 dark:text-gray-200">Id</th>
                            <th class="border-b dark:border-gray-600 py-2 text-left px-4 text-gray-800 dark:text-gray-200">Name</th>

                            <th class="border-b dark:border-gray-600 py-2 text-left px-4 text-gray-800 dark:text-gray-200">Email</th>

                            <th class="border-b dark:border-gray-600 py-2 text-left px-4 text-gray-800 dark:text-gray-200">Roles</th>

                            <th class="border-b dark:border-gray-600 py-2 text-left px-4 text-gray-800 dark:text-gray-200" width="40%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr class="{{ $index % 2 == 0 ? 'bg-gray-50 dark:bg-gray-800' : 'bg-white dark:bg-gray-900' }} transition-colors duration-200">
                            <td class="border-b dark:border-gray-600 py-3 px-4 text-gray-800 dark:text-gray-200">{{ $user->id }}</td>
                            <td class="border-b dark:border-gray-600 py-3 px-4 text-gray-800 dark:text-gray-200">{{ $user->name }}</td>

                            <td class="border-b dark:border-gray-600 py-3 px-4 text-gray-800 dark:text-gray-200">{{ $user->email }}</td>
                           
                            <td class="border-b dark:border-gray-600 py-3 px-4 text-gray-800 dark:text-gray-200">
                              @if(!empty($user->getRoleNames()))
                                @foreach ( $user->getRoleNames() as $roleName )
                                <span class="bg-blue-500 py-1 mx-1 px-2 rounded text-white ">
                                  {{ $roleName }}
                                </span>
                                @endforeach
                              @endif
                            </td>
                
                
                            <td class="border-b dark:border-gray-600 py-3 px-4">
                    <div class="flex space-x-2">
                        <a href="{{ route('users.edit',$user->id ) }}"
                                       class="bg-green-500 hover:bg-green-600 dark:bg-green-700 dark:hover:bg-green-800 text-white px-3 py-1 rounded text-sm transition-colors">
                                        Edit
                        </a>
                                    
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            
                            <button
                                class="bg-red-500 hover:bg-red-600 dark:bg-red-700 dark:hover:bg-red-800 text-white px-3 py-1 rounded text-sm transition-colors"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                Delete
                            </button>
                       </form>
                 </div>
                 </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   
</x-app-layout>
