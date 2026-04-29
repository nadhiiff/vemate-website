<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('emergency_requests', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Relasi ke tabel users
                $table->string('location_address'); // Lokasi yang diketik pengguna
                $table->enum('vehicle_type', ['roda_2', 'roda_4']);
                $table->string('vehicle_model'); // Contoh: Honda Scoopy 2022
                $table->text('problem_description');
                $table->string('vehicle_photo_path')->nullable(); // Untuk menyimpan foto kendaraan
                
                // Status pesanan untuk alur persetujuan harga
                $table->enum('status', [
                    'mencari_mitra', 
                    'menunggu_konfirmasi_harga', 
                    'harga_disetujui', 
                    'selesai', 
                    'dibatalkan'
                ])->default('mencari_mitra');
                
                $table->integer('estimated_price')->nullable(); // Harga dari mitra
                $table->unsignedBigInteger('mitra_id')->nullable(); // ID mekanik/mitra yang menangani
                
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('emergency_requests');
        }
    };
?>