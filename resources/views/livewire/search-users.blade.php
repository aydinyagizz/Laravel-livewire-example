{{--<div>--}}
{{--    <div class="mb-4">--}}
{{--        <input--}}
{{--            type="text"--}}
{{--            placeholder="Kullanıcı Ara..."--}}
{{--            wire:model.live="search"--}}
{{--            class="form-control"--}}
{{--            style="border: white solid 1px!important;"--}}
{{--        />--}}
{{--    </div>--}}

{{--    <ul>--}}
{{--        @if($users->count() > 0)--}}
{{--            @foreach($users as $user)--}}
{{--                <li>{{ $user->name }}</li>--}}
{{--            @endforeach--}}
{{--        @else--}}
{{--            <li>Kullanıcı bulunamadı.</li>--}}
{{--        @endif--}}
{{--    </ul>--}}
{{--</div>--}}



<div>
    <div class="mb-4">
        <input
            type="text"
            class="form-control w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border rounded"
            placeholder="Kullanıcı Ara..."
            wire:model.live="search"

        />
    </div>

    <div class="mt-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    İsim
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @forelse($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $user->email }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="px-6 py-4 text-center">
                        Kullanıcı bulunamadı.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
