<?php

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\Reactive;
use Livewire\Volt\Component;

new class extends Component {
    #[Modelable]
    public $value = null;

    public $name;

    #[Reactive]
    public $options;

    public function mount($name, $options)
    {
        $this->name = $name;
        $this->options = $options;
        $this->options->ensure([Country::class, State::class, City::class]);
    }
}; ?>

<div class="mb-3">
    <label class="mb-2 text-xl font-semibold text-black dark:text-white">{{ $name }}</label>

    <select wire:model.live="value"
        class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="" selected>Choose {{ $name }}</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
</div>
