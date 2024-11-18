<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SearchUsers extends Component
{
    use WithPagination;

    public $search = '';

    //url de arama kısmını gizle
    //protected $queryString = ['search'];

    // Eventi dinle
    protected $listeners = ['userCreated' => '$refresh'];

     protected $paginationTheme = 'tailwind'; // Tailwind kullanıyorsanız
    //protected $paginationTheme = 'bootstrap';

    // Browser event'ini dinle
    public function userCreated()
    {
        // Bu method event tetiklendiğinde çalışacak
        $this->render();
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(5);

        return view('livewire.search-users', [
            'users' => $users
        ]);
    }
}
