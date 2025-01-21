@extends('layouts.dashboard')

@php
    $transactionTH = ['ID', 'Nama Pembeli', 'Total', 'Metode Pembayaran', 'Status', 'Tanggal', ''];
@endphp

@section('content')
    <x-ui.card>
        <div class="mb-4">
            <h3 class="mb-6">Kelola Transaksi</h3>
        </div>

        <x-ui.table>
            <tr>
                @foreach ($transactionTH as $th)
                    <x-ui.table-th>{{ $th }}</x-ui.table-th>
                @endforeach
            </tr>
            @forelse ($transactions as $transaction)
                <tr>
                    <x-ui.table-td class="text-center">{{ $loop->iteration }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">{{ $transaction->cart->user->first_name }}
                        {{ $transaction->cart->user->last_name }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">{{ number_format($transaction->total) }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">{{ $transaction->payment_method }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">
                        <span class="bg-primary-600 text-white px-4 py-2 rounded-lg">{{ $transaction->status }}</span>
                    </x-ui.table-td>
                    <x-ui.table-td class="text-center">{{ $transaction->createdAtDateFormat }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">
                        <div class="flex items-center justify-center gap-4">
                            <x-ui.button type="button" buttonType="info" class="rounded-lg !py-3 !px-4" x-data
                                x-on:click="() => window.location.href = '{{ route('dashboard.product.edit', ['product' => $transaction->id]) }}'">
                                <x-slot:label>
                                    <i class="fa-solid fa-eye size-4"></i>
                                </x-slot:label>
                            </x-ui.button>
                        </div>
                    </x-ui.table-td>
                </tr>
            @empty
            @endforelse
        </x-ui.table>
    </x-ui.card>
@endsection
