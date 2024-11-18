<div>
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Yeni Kullanıcı Ekle</h2>

        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit="save">
            <div class="mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">İsim</label>
                    <input type="text" wire:model.live="name"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                </div>
                 @error('name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">E-posta</label>
                    <input type="email" wire:model.live="email"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                </div>
                @error('email')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Şifre</label>
                    <input type="password" wire:model.live="password"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                </div>
               @error('password')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Kullanıcı Ekle
            </button>
        </form>
    </div>
</div>


