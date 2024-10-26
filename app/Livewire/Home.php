<?php

namespace App\Livewire;

use App\Models\Media;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Review;

#[Title('Accueil - LayzFlix')]
#[Layout('layouts.app')]
class Home extends Component
{
    public function render()
    {
        $topRatedMediaFromReview = Review::select('media_id', DB::raw('AVG(rating) as avg_rating'))
            ->groupBy('media_id')
            ->orderByDesc('avg_rating')
            ->with('media')
            ->get()->take(3);

        $topRatedMedia = collect();

        foreach ($topRatedMediaFromReview as $index => $media) {
            $mediaToPush = Media::where('id', $media->media_id)->first();
            $mediaToPush['rank'] = $index + 1;

            $topRatedMedia->push($mediaToPush);
        }

        return view('livewire.home', [
            'reviews' => Review::with('user')->latest()->take(3)->get(),
            'popularMedias' => $topRatedMedia,
        ]);
    }
}
