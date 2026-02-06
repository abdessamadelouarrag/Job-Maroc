<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Offre;

class OffresInfinite extends Component
{
    public int $perPage = 5;

    public function loadMore(): void
    {
        $this->perPage += 5;
    }

    public function render()
    {
        return view('livewire.offres-infinite', [
            'offres' => Offre::latest()->take($this->perPage)->get(),
            'hasMore' => Offre::count() > $this->perPage,
        ]);
    }
}
