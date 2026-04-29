<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-indigo-900 leading-tight">
            Panel Mitra VEMATE - Permintaan Masuk
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($requests->isEmpty())
                <div class="bg-white p-8 rounded-lg shadow text-center">
                    <p class="text-gray-500 italic">Belum ada permintaan bantuan darurat saat ini. Tetap stand by! 🛠️</p>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($requests as $item)
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-200">
                    <div class="h-48 w-full bg-gray-200">
                        @if($item->vehicle_photo_path)
                            <img src="{{ asset('storage/' . $item->vehicle_photo_path) }}" class="w-full h-full object-cover">
                        @else
                            <div class="flex items-center justify-center h-full text-gray-400 italic text-sm">Tidak ada foto</div>
                        @endif
                    </div>

                    <div class="p-5">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-bold text-lg text-gray-900">{{ $item->vehicle_model }}</h3>
                                <span class="px-2 py-1 bg-indigo-100 text-indigo-700 text-xs font-bold rounded uppercase">
                                    {{ str_replace('_', ' ', $item->vehicle_type) }}
                                </span>
                            </div>
                            <p class="text-xs text-gray-400">{{ $item->created_at->diffForHumans() }}</p>
                        </div>

                        <div class="space-y-2 mb-4">
                            <p class="text-sm text-gray-600"><span class="font-semibold text-indigo-900">Pelanggan:</span> {{ $item->user->name }}</p>
                            <p class="text-sm text-gray-600"><span class="font-semibold text-red-500 font-sans">📍 Lokasi:</span> {{ $item->location_address }}</p>
                            <p class="text-sm text-gray-500 bg-gray-50 p-2 rounded border-l-4 border-yellow-400 italic">
                                "{{ $item->problem_description }}"
                            </p>
                        </div>

                        <form action="{{ route('emergency.estimate', $item->id) }}" method="POST">
                            @csrf
                            <div class="flex items-center space-x-2">
                                <div class="relative flex-grow">
                                    <span class="absolute left-3 top-2 text-gray-400 text-sm">Rp</span>
                                    <input type="number" name="estimated_price" placeholder="Estimasi Harga" 
                                           class="w-full pl-10 pr-4 py-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm" required>
                                </div>
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg text-sm transition">
                                    Kirim
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>