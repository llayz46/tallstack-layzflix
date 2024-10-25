<?php

namespace App\Livewire;

use App\Models\Media;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Review extends Component
{
    use WithPagination, InteractsWithBanner;

    public array $media;

    #[Validate('required', message: 'Vous devez saisir une note.')]
    #[Validate('numeric', message: 'La note doit être un nombre.')]
    #[Validate('min:1', message: 'La note doit être au minimum de 1.')]
    #[Validate('max:5', message: 'La note doit être au maximum de 5.')]
    public int $rating = 0;

    #[Validate('required', message: 'Vous devez saisir une critique.')]
    #[Validate('min:10', message: 'La critique doit faire au moins 10 caractères.')]
    #[Validate('max:1000', message: 'La critique doit faire au maximum 1000 caractères.')]
    public string $content = '';

    public function mount(array $media)
    {
        $this->media = $media;

        if (auth()->check()) {
            $this->loadReview($media);
        }
    }

    public function submit()
    {
        if (!auth()->check()) {
            $this->dangerBanner('Vous devez être connecté pour laisser un avis.');
        }

        $this->validate();

        $media = Media::firstOrCreate([
            'media_id' => $this->media['id'],
            'media_type' => $this->media['media_type'],
            'normalized_title' => $this->media['normalized_title'],
            'overview' => $this->media['overview'],
            'poster_path' => $this->media['poster_path'],
            'release_date' => $this->media['release_date'],
        ]);

        auth()->user()->reviews()->updateOrCreate([
            'media_id' => $media->id,
        ],
            [
            'rating' => $this->rating,
            'content' => $this->content,
            'media_id' => $media->id,
        ]);

        $this->banner('Votre critique a bien été sauvegardée.');
    }

    public function delete(array $review)
    {
        if (!auth()->check()) {
            $this->dangerBanner('Vous devez être connecté pour supprimer une critique.');
        }

        if (auth()->user()->id !== $review['user_id']) {
            $this->dangerBanner('Vous ne pouvez pas supprimer une critique qui ne vous appartient pas.');
        }

        auth()->user()->reviews()->where('id', $review['id'])->delete();

        $this->banner('La critique a été supprimé avec succès.');

        $this->reset('rating', 'content');
    }

    private function loadReview(array $media)
    {
        $review = auth()->user()->reviews->load('media')->where('media.media_id', $media['id'])->first();

        if ($review) {
            $this->rating = $review->rating;
            $this->content = $review->content;
        }
    }

    public function render()
    {
        $media = Media::where('media_id', $this->media['id'])->first();

        return view('livewire.review', [
            'reviews' => $media ? $media->reviews->load('user')->sortByDesc('created_at')->paginate(5) : null,
        ]);
    }
}
