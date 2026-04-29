<?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\EmergencyRequestController;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/darurat', [EmergencyRequestController::class, 'create'])->name('emergency.create');
        Route::post('/darurat', [EmergencyRequestController::class, 'store'])->name('emergency.store');
        Route::get('/mitra/dashboard', [EmergencyRequestController::class, 'mitraIndex'])->name('mitra.dashboard');
        Route::post('/mitra/estimate/{id}', [EmergencyRequestController::class, 'sendEstimate'])->name('emergency.estimate');
    });

    require __DIR__.'/auth.php';
?>