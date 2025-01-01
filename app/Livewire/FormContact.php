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

        $result = Contact::firstOrCreate(
            [
                'name' => $this->name,
                'email' => $this->email
            ],
            [
                'phone' => $this->phone
            ]
        );

        if($result->wasRecentlyCreated) {
            $this->reset();

            //create an event
            $this->dispatch('contactAdded');
            $this->dispatch(
                'notification',
                type: 'success',
                title: 'Contact created successfully.',
                position: 'center'
            );

        }else {

            $this->dispatch(
                'notification',
                type: 'error',
                title: 'Contact already exists.',
                position: 'center'
            );
        }


    }

    public function render()
    {
        return view('livewire.form-contact');
    }
}
