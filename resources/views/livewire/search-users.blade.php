<div>
    <div class="mb-4">
        <input
            type="text"
            placeholder="Kullanıcı Ara..."
            wire:model.live="search"
            class="form-control"
            style="border: white solid 1px!important;"
        />
    </div>

    <ul>
        @if($users->count() > 0)
            @foreach($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        @else
            <li>Kullanıcı bulunamadı.</li>
        @endif
    </ul>
</div>
