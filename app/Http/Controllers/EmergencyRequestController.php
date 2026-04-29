<?php
    namespace App\Http\Controllers;


    use App\Models\EmergencyRequest;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class EmergencyRequestController extends Controller
    {
        // Menampilkan form UI Darurat
        public function create()
        {
            return view('emergency.create');
        }

        // Menyimpan data dari form
        public function store(Request $request)
        {
            $request->validate([
                'location_address' => 'required|string|max:255',
                'vehicle_type' => 'required|in:roda_2,roda_4',
                'vehicle_model' => 'required|string|max:255',
                'problem_description' => 'required|string',
                'vehicle_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Wajib foto, max 2MB
            ]);

            // Proses simpan foto ke folder storage/app/public/emergency_photos
            $photoPath = $request->file('vehicle_photo')->store('emergency_photos', 'public');

            // Simpan ke database
            EmergencyRequest::create([
                'user_id' => Auth::id(),
                'location_address' => $request->location_address,
                'vehicle_type' => $request->vehicle_type,
                'vehicle_model' => $request->vehicle_model,
                'problem_description' => $request->problem_description,
                'vehicle_photo_path' => $photoPath,
                'status' => 'mencari_mitra'
            ]);

            // Arahkan pengguna ke halaman status
            return redirect()->route('dashboard')->with('success', 'Permintaan darurat berhasil dikirim! Menunggu respons mitra terdekat.');
        }
        // 1. Halaman Dashboard untuk Mitra (Yang tadi error)
        public function mitraIndex()
        {
            // Mengambil semua permintaan yang statusnya masih mencari mitra
            $requests = EmergencyRequest::where('status', 'mencari_mitra')->with('user')->get();
            return view('emergency.mitra-dashboard', compact('requests'));
        }

        // 2. Proses Mitra mengirim estimasi harga
        public function sendEstimate(Request $request, $id)
        {
            $request->validate([
                'estimated_price' => 'required|numeric|min:1000',
            ]);

            $emergency = EmergencyRequest::findOrFail($id);
            $emergency->update([
                'estimated_price' => $request->estimated_price,
                'mitra_id' => Auth::id(),
                'status' => 'menunggu_konfirmasi_harga',
            ]);
            return redirect()->back()->with('success', 'Estimasi harga berhasil dikirim ke pengguna!');
        }
    }
?>