<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction as MidtransTransaction;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;


class PaymentController extends Controller
{
    public function process(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
        Config::$curlOptions[CURLOPT_SSL_VERIFYHOST] = 0;
        Config::$curlOptions[CURLOPT_SSL_VERIFYPEER] = 0;
        Config::$curlOptions[CURLOPT_HTTPHEADER] = [];

        // Data transaksi
        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $request->total,
            ],
            'customer_details' => [
                'first_name' => $request->user()->name,
                'email' => $request->user()->email,
            ],
        ];

        // Buat token pembayaran menggunakan SNAP
        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json(['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function paymentCallback(Request $request)
    {
        $result = $request->all();  // Terima data callback dari Midtrans

        // Pastikan bahwa kita menerima transaction_status dalam hasil callback
        if (isset($result['transaction_status'])) {

            // Ambil transaksi berdasarkan order_id
            $transaction = Transaction::where('cart_id', $result['order_id'])->first();

            // Jika transaksi sudah ada, update statusnya, jika belum buat transaksi baru
            if (!$transaction) {
                // Jika transaksi belum ada, buat transaksi baru
                $transaction = Transaction::create([
                    'cart_id' => $result['order_id'],
                    'tax' => $result['gross_amount'] * 0.1,  // Contoh perhitungan pajak
                    'total' => $result['gross_amount'],
                    'payment_method' => $result['payment_type'],
                    'status' => $result['transaction_status'], // Set status berdasarkan status transaksi Midtrans
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                // Jika transaksi sudah ada, hanya update statusnya
                $transaction->update([
                    'status' => $result['transaction_status'],
                    'updated_at' => now(),
                ]);
            }

            // Menangani masing-masing status transaksi
            switch ($result['transaction_status']) {
                case 'settlement':
                    // Pembayaran berhasil
                    // Lakukan tindakan sesuai kebutuhan (misal kirim email, notifikasi, dsb)
                    break;
                case 'pending':
                    // Pembayaran sedang dalam proses
                    break;
                case 'cancel':
                    // Pembayaran dibatalkan
                    break;
                default:
                    // Status lain (misalnya 'expired', 'failed', dll)
                    break;
            }

            return response()->json([
                'message' => 'Transaction updated successfully',
                'transaction' => $transaction
            ], 200);
        }

        return response()->json(['message' => 'Transaction status not found in the callback data'], 400);
    }
}
