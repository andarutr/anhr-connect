<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\MasterCompany;
use Livewire\Attributes\Validate;

class McuForm extends Form
{
    public $id = null;

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|string')]
    public $location = '';

    public function setMcuData(MasterCompany $mcu)
    {
        $this->id = $mcu->id;
        $this->name = $mcu->name;
        $this->location = $mcu->location;
    }

    public function store()
    {
        $this->validate();

        MasterCompany::create([
            'name' => $this->name,
            'location' => $this->location,
        ]);
    }

    public function update()
    {
        $this->validate();

        $mcu = MasterCompany::findOrFail($this->id);
        $mcu->update([
            'name' => $this->name,
            'location' => $this->location,
        ]);
    }
}