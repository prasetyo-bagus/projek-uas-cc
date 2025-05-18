<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCodeMail;
use App\Models\EmailVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmailVerificationController extends Controller
{
    /**
     * Kirim kode verifikasi ke email pengguna
     */
    public function sendVerificationCode(Request $request)
    {
        try {
            // Validasi request
            $request->validate([
                'email' => 'required|email',
                'name' => 'required|string'
            ]);

            $email = $request->email;
            $name = $request->name;
            
            // Log untuk debugging
            Log::info('Mencoba mengirim kode verifikasi', [
                'email' => $email,
                'name' => $name
            ]);
            
            // Generate kode verifikasi 6 digit
            $verificationCode = sprintf('%06d', mt_rand(1, 999999));
            
            // Simpan ke database
            $verification = EmailVerification::updateOrCreate(
                ['email' => $email],
                [
                    'verification_code' => $verificationCode,
                    'expires_at' => now()->addMinutes(10), // Kode berlaku 10 menit
                    'verification_id' => Str::uuid(),
                    'is_verified' => false,
                ]
            );
            
            // Log untuk debugging
            Log::info('Data verifikasi berhasil disimpan', [
                'verification_id' => $verification->verification_id
            ]);
            
            // Kirim email dengan kode verifikasi
            Mail::to($email)->send(new VerificationCodeMail($name, $verificationCode));
            
            // Log untuk debugging
            Log::info('Email verifikasi berhasil dikirim');
            
            return response()->json([
                'success' => true,
                'message' => 'Kode verifikasi telah dikirim ke email Anda',
                'verification_id' => $verification->verification_id
            ]);
        } catch (\Exception $e) {
            // Log detail error
            Log::error('Gagal mengirim kode verifikasi', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim kode verifikasi: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Verifikasi kode yang dimasukkan oleh pengguna
     */
    public function verifyCode(Request $request)
    {
        try {
            // Validasi request
            $request->validate([
                'verification_id' => 'required|string',
                'code' => 'required|string|size:6'
            ]);

            $verificationId = $request->verification_id;
            $code = $request->code;
            
            // Log untuk debugging
            Log::info('Mencoba verifikasi kode', [
                'verification_id' => $verificationId,
                'code' => $code
            ]);
            
            // Cari data verifikasi
            $verification = EmailVerification::where('verification_id', $verificationId)
                ->where('expires_at', '>', now())
                ->first();
            
            if (!$verification) {
                Log::warning('Kode verifikasi tidak ditemukan atau kadaluwarsa', [
                    'verification_id' => $verificationId
                ]);
                
                return response()->json([
                    'success' => false,
                    'message' => 'Kode verifikasi tidak valid atau telah kedaluwarsa'
                ], 400);
            }
            
            // Cek apakah kode yang dimasukkan benar
            if ($verification->verification_code !== $code) {
                Log::warning('Kode verifikasi tidak cocok', [
                    'expected' => $verification->verification_code,
                    'received' => $code
                ]);
                
                return response()->json([
                    'success' => false,
                    'message' => 'Kode verifikasi tidak valid'
                ], 400);
            }
            
            // Tandai sebagai terverifikasi
            $verification->update([
                'is_verified' => true,
                'verified_at' => now()
            ]);
            
            Log::info('Email berhasil diverifikasi', [
                'email' => $verification->email
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Email berhasil diverifikasi'
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal memverifikasi kode', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memverifikasi kode: ' . $e->getMessage()
            ], 500);
        }
    }
} 