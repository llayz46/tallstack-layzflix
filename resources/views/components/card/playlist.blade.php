@props(['playlist', 'user'])

<li class="overflow-hidden rounded-xl border border-border-normal list-none">
    <div class="flex items-center justify-between gap-x-4 border-b border-background-accent-hover bg-background-accent-hover p-6">
        <a href="{{ route('playlist', [$user->slug, $playlist]) }}" class="text-sm font-medium leading-6 text-gray-300 hover:no-underline underline">{{ $playlist->name }}</a>
        <div class="inline-flex gap-2">
            @auth
                @can('delete', $playlist)
                    <form method="POST" wire:submit.prevent="deletePlaylist({{ $playlist->id }})">
                        <x-button>Supprimer</x-button>
                    </form>
                @endcan
            @endauth
        </div>
    </div>
    <dl class="-my-3 divide-y divide-background-accent-hover px-6 py-4 text-sm leading-6">
        <div class="flex justify-between gap-x-4 py-3">
            <dt class="text-neutral-400">Description</dt>
            <dd class="text-gray-300 line-clamp-1">{{ $playlist->description }}</dd>
        </div>
        <div class="flex justify-between gap-x-4 py-3">
            <dt class="text-neutral-400">Créé le</dt>
            <dd class="text-gray-300"><time datetime="{{ $playlist['created_at'] }}">{{ Illuminate\Support\Carbon::createFromDate($playlist['created_at'])->translatedFormat('j') }} {{ ucfirst(Illuminate\Support\Carbon::createFromDate($playlist['created_at'])->translatedFormat('F')) }} {{ Illuminate\Support\Carbon::createFromDate($playlist['created_at'])->translatedFormat('Y') }}</time></dd>
        </div>
        <div class="flex justify-between gap-x-4 py-3">
            <dt class="text-neutral-400">Visibilité</dt>
            <dd class="flex items-start gap-x-2">
                @auth
                    @if(auth()->user()->id === $playlist->user_id)
                        <button wire:click="updateVisibility({{ $playlist->id }})" class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset @if($playlist->visibility) text-green-400 bg-green-400/10 ring-green-500/20 @else text-red-400 bg-red-400/10 ring-red-500/20 @endif">@if($playlist->visibility) Publique @else Privé @endif</button>
                    @else
                        <span class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset @if($playlist->visibility) text-green-400 bg-green-400/10 ring-green-500/20 @else text-red-400 bg-red-400/10 ring-red-500/20 @endif">@if($playlist->visibility) Publique @else Privé @endif</span>
                    @endif
                @else
                    <span class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset @if($playlist->visibility) text-green-400 bg-green-400/10 ring-green-500/20 @else text-red-400 bg-red-400/10 ring-red-500/20 @endif">@if($playlist->visibility) Publique @else Privé @endif</span>
                @endauth
            </dd>
        </div>
    </dl>
</li>
