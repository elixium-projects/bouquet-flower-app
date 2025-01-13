@extends('layouts.dashboard')

@php
    $transactionTH = ['ID', 'Nama', 'Total', 'Metode Pembayaran', 'Status', 'Tanggal'];
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
        </x-ui.table>
    </x-ui.card>
@endsection
