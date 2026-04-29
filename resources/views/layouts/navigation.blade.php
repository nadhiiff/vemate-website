<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <!-- Logo Kiri -->
            <div class="flex items-center font-extrabold text-xl text-indigo-600 italic">
                VEMATE
            </div>
            
            <!-- Menu Kanan (Nama User & Logout) -->
            <div class="flex items-center">
                <div x-data="{ dropdownOpen: false }" class="relative">
                    
                    <!-- Tombol Nama User -->
                    <button @click="dropdownOpen = !dropdownOpen" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                        <div>{{ Auth::user()->name }}</div>
                        <svg class="ml-1 fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Isi Dropdown (Muncul saat diklik) -->
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 border border-gray-100 z-50" style="display: none;">
                        
                        <!-- Form Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 font-semibold hover:bg-red-50 focus:outline-none transition duration-150 ease-in-out">
                                Log Out
                            </button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>