<?php

use App\Models\City;
use App\Models;
use App\Models\State;
use Livewire\Volt\Component;

new class extends Component {
    public $countries;

    public $states;

    public $cities;

    public $selectedCountry = null;

    public $selectedState = null;

    public function mount()
    {
        $this->countries = Country::all();
    }

    public function updatedSelectedCountry($country)
    {
        $this->selectedState = null;
        if ($country != null) {
            $this->states = State::where('country_id', $country)->get();
        }
    }

    public function updatedSelectedState($state)
    {
        if ($state != null) {
            $this->cities = City::where('state_id', $state)->get();
        }
    }
}; ?>

<div class="max-w-md mx-auto">
    <livewire:selectoption name="Country" :options="$countries" wire:model.live="selectedCountry" />

    @if (!is_null($selectedCountry))
        <livewire:selectoption name="State" :options="$states" wire:model.live="selectedState" />
    @endif

    @if (!is_null($selectedState))
        <livewire:selectoption name="City" :options="$cities" />
    @endif
</div>
