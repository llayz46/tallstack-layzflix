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
        $topRatedMediaFromReview = Review::select(
            'media_id',
            DB::raw('AVG(rating) as avg_rating'),
            DB::raw('COUNT(rating) as review_count'))
            ->groupBy('media_id')
            ->orderByDesc('avg_rating')
            ->orderByDesc('review_count')
            ->with('media')
            ->take(3)
            ->get();

        $topRatedMedia = collect();

        foreach ($topRatedMediaFromReview as $index => $media) {
            $mediaToPush = Media::where('id', $media->media_id)->first();
            $mediaToPush['rank'] = $index + 1;

            $topRatedMedia->push($mediaToPush);
        }

        $topUsersFromReviews = Review::groupBy('user_id')
            ->select('user_id', DB::raw('COUNT(*) as total_reviews'))
            ->orderByDesc('total_reviews')
            ->with('user')
            ->get()->take(3);

        $topUsers = collect();

        foreach ($topUsersFromReviews as $user) {
            $userToPush = $user->user;
            $userToPush['total_reviews'] = $user->total_reviews;

            $topUsers->push($userToPush);
        }

        return view('livewire.home', [
            'reviews' => Review::with('user')->latest()->take(3)->get(),
            'popularMedias' => $topRatedMedia,
            'users' => $topUsers,
        ]);
    }
}
