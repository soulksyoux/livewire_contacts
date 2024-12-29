<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormContact extends Component
{
    #[Validate(['required', 'min:3', 'max:50'])]
    public $name;

    #[Validate(['required', 'email', 'min:5', 'max:50'])]
    public $email;

    #[Validate(['required', 'min:5', 'max:20'])]
    public $phone;

    public function newContact() {

        $this->validate();

        // $this->validate([
        //     'name' => ['required', 'min:3', 'max:50'],
        //     'email' => ['required', 'email', 'min:5', 'max:50'],
        //     'phone' => ['required', 'min:5', 'max:20'],
        // ]);

        Contact::firstOrCreate(
            [
                'name' => $this->name,
                'email' => $this->email
            ],
            [
                'phone' => $this->phone
            ]
        );

        $this->reset();
    }

    public function render()
    {
        return view('livewire.form-contact');
    }
}
