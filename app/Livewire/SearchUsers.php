<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';

   // protected $queryString = ['search'];

    public function updatedSearch()
    {
        $this->render();
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.search-users', [
            'users' => $users
        ]);
    }
}
