<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    //Boolean
    public $isSubmitActive = false;

    protected $rules = [
        'email' => 'required|email:rfc,dns|exists:users,email',
        'password' => [
            'required',
            'min:8',
        ],
    ];

    protected $messages = [
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.exists' => 'Email belum terdaftar.',
        'password.required' => 'Password wajib diisi.',
        // 'password.min' => 'Password minimal 8 karakter.',
    ];

    public function isFormFilled()
    {
        if (!empty($this->email) && !empty($this->password)) {
            $this->isSubmitActive = true;
        } else {
            $this->isSubmitActive = false;
        }
    }

    public function updated($property)
    {
        $this->isFormFilled();

        if ($property == 'email') {
            $this->validateOnly('email');
        }

        if ($property == 'password') {
            $this->validateOnly('password');
        }
    }

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            session()->flash('message', 'You have successfully logged in!');

            return $this->redirectRoute('dashboard');
        }

        session()->flash('error', 'Invalid credentials!');
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('components.layouts.auth');
    }
}
