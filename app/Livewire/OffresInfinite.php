<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Offre;
use App\Models\MyOffre;
use Illuminate\Support\Facades\Auth;

class OffresInfinite extends Component
{
    public int $perPage = 5;
    public array $appliedOffersIds = [];

    public function mount(): void
    {
        $this->refreshAppliedOffers();
    }

    public function loadMore(): void
    {
        $this->perPage += 5;
    }

    public function refreshAppliedOffers(): void
    {
        if (!Auth::check()) {
            $this->appliedOffersIds = [];
            return;
        }

        $this->appliedOffersIds = MyOffre::where('id_user', Auth::id())
            ->where('status', 'applied')
            ->pluck('id_offre')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.offres-infinite', [
            'offres'  => Offre::latest()->take($this->perPage)->get(),
            'hasMore' => Offre::count() > $this->perPage,
        ]);
    }
}
