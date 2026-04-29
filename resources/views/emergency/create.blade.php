<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-indigo-900 to-purple-800 py-10">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl p-6">
                <h2 class="text-xl font-bold text-indigo-900 mb-4 font-sans">Butuh bantuan Darurat?</h2>

                <div class="w-full h-40 bg-gray-300 rounded-lg mb-4 flex items-center justify-center overflow-hidden relative">
                    <img src="https://maps.googleapis.com/maps/api/staticmap?center=-5.147665,119.432732&zoom=14&size=600x300&maptype=roadmap&markers=color:red%7Clabel:B%7C-5.147665,119.432732&key=YOUR_API_KEY" alt="Map" class="w-full h-full object-cover opacity-70">
                    <div class="absolute inset-0 bg-black bg-opacity-10 flex items-center justify-center">
                        <span class="text-gray-800 font-semibold bg-white px-3 py-1 rounded-full text-xs shadow">Peta Area Anda</span>
                    </div>
                </div>

                <form action="{{ route('emergency.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-5">
                        <div class="relative">
                            <input type="text" name="location_address" placeholder="Lokasi Anda Saat ini" class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 text-sm" required>
                            <svg class="w-5 h-5 text-gray-400 absolute right-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-indigo-900 mb-2">Jenis Kendaraan Anda</label>
                        <div class="flex items-center space-x-6">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio text-purple-600 focus:ring-purple-500" name="vehicle_type" value="roda_2" checked>
                                <span class="ml-2 text-sm text-gray-700">Roda 2</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio text-purple-600 focus:ring-purple-500" name="vehicle_type" value="roda_4">
                                <span class="ml-2 text-sm text-gray-700">Roda 4</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-indigo-900 mb-1">Tipe Kendaraan Anda</label>
                        <input type="text" name="vehicle_model" placeholder="Contoh: Honda Scoopy 2022" class="w-full border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 text-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-indigo-900 mb-1">Deskripsi Singkat Masalah Anda</label>
                        <textarea name="problem_description" rows="3" placeholder="Deskripsikan Masalah yang kendaraan anda alami.." class="w-full border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 text-sm" required></textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-indigo-900 mb-1">Foto Kendaraan (Bukti Masalah)</label>
                        <input type="file" name="vehicle_photo" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100" required>
                    </div>

                    <div class="flex justify-center mt-6">
                        <button type="submit" class="bg-purple-500 hover:bg-purple-600 text-white font-semibold py-2 px-10 rounded-full shadow-md transition duration-200">
                            Kirim
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>