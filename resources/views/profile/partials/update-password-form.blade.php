<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Ubah kata sandi
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Pastikan menggunakan kata sandi yang panjang dan aman.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <x-ui.form-group class="!mb-0 relative" x-data="{ showCurrentPassword: false }">
            <x-ui.input-label value="Password sekarang" for="current_password" :isRequired="true" />
            <x-ui.input-element x-bind:type="showCurrentPassword ? 'text' : 'password'" name="current_password"
                id="current_password" placeholder="Masukan password sekarang" :validate="$errors->has('current_password')"
                value="{{ old('current_password') }}" />
            <button type="button" class="text-xl absolute right-[24px] top-1/2 text-surface-800"
                x-on:click="() => showCurrentPassword = !showCurrentPassword">
                <i x-bind:class="showCurrentPassword ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"></i>
            </button>
            @error('current_password')
                <span class="block mt-1 text-danger-500">{{ $message }}</span>
            @enderror
        </x-ui.form-group>

        <x-ui.form-group class="!mb-0 relative" x-data="{ showPassword: false }">
            <x-ui.input-label value="Password baru" for="password" :isRequired="true" />
            <x-ui.input-element x-bind:type="showPassword ? 'text' : 'password'" name="password" id="password"
                placeholder="Masukan password baru" :validate="$errors->has('password')" value="{{ old('password') }}" />
            <button type="button" class="text-xl absolute right-[24px] top-1/2 text-surface-800"
                x-on:click="() => showPassword = !showPassword">
                <i x-bind:class="showPassword ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"></i>
            </button>
            @error('password')
                <span class="block mt-1 text-danger-500">{{ $message }}</span>
            @enderror
        </x-ui.form-group>

        <x-ui.form-group class="!mb-0 relative" x-data="{ showConfirmationPassword: false }">

            <x-ui.input-label value="Password konfirmasi" for="password_confirmation" :isRequired="true" />
            <x-ui.input-element x-bind:type="showConfirmationPassword ? 'text' : 'password'"
                name="password_confirmation" id="password_confirmation" placeholder="Masukan password konfirmasi"
                :validate="$errors->has('password_confirmation')" value="{{ old('password_confirmation') }}" />
            <button type="button" class="text-xl absolute right-[24px] top-1/2 text-surface-800"
                x-on:click="() => showConfirmationPassword = !showConfirmationPassword">
                <i x-bind:class="showConfirmationPassword ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"></i>
            </button>
            @error('password_confirmation')
                <span class="block mt-1 text-danger-500">{{ $message }}</span>
            @enderror
        </x-ui.form-group>

        <div class="flex items-center gap-4">
            <x-ui.button buttonType="primary" type="submit" label="Update Password" class="w-full rounded-lg" />
        </div>
    </form>
</section>
