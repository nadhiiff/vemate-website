<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class EmergencyRequest extends Model
    {
        protected $fillable = [
            'user_id',
            'location_address',
            'vehicle_type',
            'vehicle_model',
            'problem_description',
            'vehicle_photo_path',
            'status',
            'estimated_price',
            'mitra_id'
        ];

        // Relasi balik ke User
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    }
?>