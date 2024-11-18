<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
    public $name;
    public $email;
    public $password;

    // Doğrulama kuralları
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
    ];

    // Gerçek zamanlı doğrulama mesajları
    protected $messages = [
        'name.required' => 'İsim alanı zorunludur.',
//        'name.min' => 'İsim en az 3 karakter olmalıdır.',
        'email.required' => 'E-posta alanı zorunludur.',
        'email.email' => 'Geçerli bir e-posta adresi giriniz.',
        'email.unique' => 'Bu e-posta adresi zaten kayıtlı.',
        'password.required' => 'Şifre alanı zorunludur.',
//        'password.min' => 'Şifre en az 6 karakter olmalıdır.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validatedData = $this->validate();

        // Şifreyi hashle
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Kullanıcıyı oluştur
        User::create($validatedData);

        // Formu temizle
        $this->reset(['name', 'email', 'password']);

        // Başarı mesajı
        session()->flash('message', 'Kullanıcı başarıyla oluşturuldu!');

        // Event yayınla aynı sayfada sayfa yenilenmden veriyi güncellemek için
        $this->dispatch('userCreated');

        // Browser Events kullanarak eventi yayınla
        //bu da farklı sayfada sayfa yenilenmeden o veriyi o sayfaya gönderme işlemi
        //yani kullnaıcı eklediğiinde anaysafada veriler otomatik listelenir
        //$this->dispatch('user-created')->to('search-users');
    }
    public function render()
    {
        return view('livewire.create-user');
    }
}
