@extends('layouts.dashboard')

@php
    $userTH = ['ID', 'Nama', 'Profile', 'Email', 'Nomor Telpon', 'Role', 'Aksi'];
@endphp

@section('content')
    <x-ui.card>
        <div class="mb-4">
            <h3 class="mb-6">Kelola User</h3>
            <div class="grid lg:grid-cols-[3fr_1fr] gap-6">
                <form action="{{ route('dashboard.users.index') }}" method="get" autocomplete="off">
                    <x-ui.input-element type="search" name="search" placeholder="Masukan keyword nama untuk pencarian" />
                </form>
                <a href="{{ route('dashboard.users.create-page') }}"
                    class="flex items-center justify-center px-6 py-3 text-white rounded-lg bg-primary-500 gap-x-4">
                    <i class="fa-solid fa-plus"></i>
                    <span>Tambah User</span>
                </a>
            </div>
        </div>
        <x-ui.table>
            <tr>
                @foreach ($userTH as $th)
                    <x-ui.table-th>{{ $th }}</x-ui.table-th>
                @endforeach
            </tr>

            @forelse ($users as $index => $user)
                <tr>
                    <x-ui.table-td class="text-center">{{ $users->firstItem() + $index }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">{{ $user->full_name }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">
                        <div class="mx-auto overflow-hidden rounded-full size-24">
                            <img src={{ $user->profileURL }} alt="profile" class="object-cover w-full h-full">
                        </div>
                    </x-ui.table-td>
                    <x-ui.table-td class="text-center">{{ $user->email }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">{{ $user->phone_number }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">{{ $user->Role->name ?? '' }}</x-ui.table-td>
                    <x-ui.table-td class="text-center">
                        <div class="flex items-center justify-center gap-4">
                            <x-ui.button type="button" buttonType="warning" class="rounded-lg !py-3 !px-4" x-data
                                x-on:click="() => window.location.href = '{{ route('dashboard.product.edit', ['product' => $user->id]) }}'">
                                <x-slot:label>
                                    <i class="fa-solid fa-pencil size-4"></i>
                                </x-slot:label>
                            </x-ui.button>
                            <x-ui.button type="button" buttonType="danger" class="rounded-lg !py-3 !px-4" x-data
                                x-on:click="() =>
                                $dispatch('open-modal', {name:'delete_modal'})
                                $dispatch('set-user-id', '{{ $user->id }}')
                                ">
                                <x-slot:label>
                                    <i class="fa-solid fa-trash size-4"></i>
                                </x-slot:label>
                            </x-ui.button>
                        </div>
                    </x-ui.table-td>
                </tr>
            @empty
                <tr>
                    <x-ui.table-td colspan="99" class="text-center">Tidak ada produk</x-ui.table-td>
                </tr>
            @endforelse
        </x-ui.table>
        {{ $users->links() }}
    </x-ui.card>

    <x-ui.modal title="" name="delete_modal">
        <div x-data="{ userId: '' }" x-on:set-user-id.window="userId = $event.detail">
            <h1 class="mb-5 text-center">Konfirmasi Penghapusan User</h1>
            <p class="text-center">
                Apakah Anda yakin ingin menghapus user ini dari daftar? Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex items-center justify-center gap-4 mt-6">
                <x-ui.button type="button" label="Batal" x-on:click="$dispatch('close-modal', {name:'delete_modal'})"
                    class="w-full text-lg rounded-lg" buttonType="outline-primary" />
                <x-ui.button type="button" label="Ya, Hapus user" x-on:click="DeleteUser(userId)"
                    class="w-full text-lg rounded-lg" />
            </div>
        </div>
    </x-ui.modal>
@endsection

@push('scripts')
    <script type="text/javascript">
        async function DeleteUser(id) {
            try {
                const resDelete = await axios({
                    method: "delete",
                    url: `${window.location.origin}/dashboard/users/delete/${id}`
                })

                if (resDelete.status === 200) {
                    window.location.reload();
                }

            } catch (err) {
                console.error(err)
                $dispatch('close-modal', {
                    name: 'delete_modal'
                })
            }
        }
    </script>
@endpush
