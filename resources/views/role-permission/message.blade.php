 <!-- Messages flash -->
        @if (session()->has('success'))
            <div class="bg-green-200 dark:bg-green-800 dark:text-green-100 text-green-800 px-4 py-2 rounded transition-colors">
                {{ session('success') }}
            </div>
        @endif
        
        @if (session()->has('error'))
            <div class="bg-red-300 dark:bg-red-800 dark:text-red-100 text-red-800 px-4 py-2 rounded transition-colors">
                {{ session('error') }}
            </div>
        @endif