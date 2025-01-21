<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Informasi profile
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Perbaharui data diri kamu.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-4">
            <h4 class="mb-6 text-lg text-center">Foto Profile</h4>
            <x-ui.input-label for="img_file_upload"
                class="relative mx-auto overflow-hidden text-center rounded-full cursor-pointer bg-surface-700 size-36 place-content-center">
                <x-slot:value>
                    <img src="{{ $user->profileURL }}" id="image_upload_preview"
                        class="absolute inset-0 object-cover w-full h-full">
                    <i class="text-xl fa-solid fa-plus bg-secondary"></i>
                </x-slot:value>
            </x-ui.input-label>
            <x-ui.input-element type="file" class="invisible mb-0 !p-0" id="img_file_upload" name="profile" />
            @error('profile')
                <span class="block mt-1 text-center text-danger-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid lg:grid-cols-2 gap-2">
            <x-ui.form-group class="!mb-0">
                <x-ui.input-label value="Nama depan" for="first_name" :isRequired="true" />
                <x-ui.input-element type="text" name="first_name" id="first_name" placeholder="Masukan nama depan"
                    :validate="$errors->has('first_name')" value="{{ old('first_name', $user->first_name) }}" />
                @error('first_name')
                    <span class="block mt-1 text-danger-500">{{ $message }}</span>
                @enderror
            </x-ui.form-group>
            <x-ui.form-group class="!mb-0">
                <x-ui.input-label value="Nama belakang" for="last_name" :isRequired="true" />
                <x-ui.input-element type="text" name="last_name" id="last_name" placeholder="Masukan nama depan"
                    :validate="$errors->has('last_name')" value="{{ old('last_name', $user->last_name) }}" />
                @error('last_name')
                    <span class="block mt-1 text-danger-500">{{ $message }}</span>
                @enderror
            </x-ui.form-group>
        </div>

        <x-ui.form-group>
            <x-ui.input-label value="Alamat email" for="email" :isRequired="true" />
            <x-ui.input-element type="text" name="email" id="email" placeholder="Masukan email pengguna"
                :validate="$errors->has('email')" value="{{ $user->email }}" />
            @error('email')
                <span class="block mt-1 text-danger-500">{{ $message }}</span>
            @enderror
        </x-ui.form-group>

        <x-ui.form-group>
            <x-ui.input-label value="Alamat" for="address" :isRequired="true" />
            <x-ui.textarea name="address" id="address" placeholder="Masukkan Alamat secara detail di sini"
                :validate="$errors->has('address')">{{ $user->address }}</x-ui.textarea>
            @error('address')
                <span class="block mt-1 text-danger-500">{{ $message }}</span>
            @enderror
        </x-ui.form-group>

        <x-ui.form-group>
            <x-ui.input-label value="Nomor telpon" for="phone_number" :isRequired="true" />
            <x-ui.input-element type="phone_number" name="phone_number" id="phone_number"
                placeholder="Masukan nomor telpon" :validate="$errors->has('phone_number')" value="{{ $user->phone_number }}" />
            @error('phone_number')
                <span class="block mt-1 text-danger-500">{{ $message }}</span>
            @enderror
        </x-ui.form-group>

        <div class="flex items-center gap-4">
            <x-ui.button buttonType="primary" type="submit" label="Update User" class="w-full rounded-lg" />

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

@push('scripts')
    @vite(['resources/js/preview-img.js'])
@endpush
