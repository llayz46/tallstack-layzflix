@props(['level'])

@php
    $color = match ($level) {
        1 => 'bg-gray-400/10 text-gray-400 ring-gray-500/20',
        2 => 'bg-lime-400/10 text-lime-400 ring-lime-500/20',
        3 => 'bg-green-400/10 text-green-400 ring-green-500/20',
        4 => 'bg-emerald-400/10 text-emerald-400 ring-emerald-500/20',
        5 => 'bg-teal-400/10 text-teal-400 ring-teal-500/20',
        6 => 'bg-cyan-400/10 text-cyan-400 ring-cyan-500/20',
        7 => 'bg-sky-400/10 text-sky-400 ring-sky-500/20',
        8 => 'bg-blue-400/10 text-blue-400 ring-blue-500/20',
        9 => 'bg-indigo-400/10 text-indigo-400 ring-indigo-500/20',
        10 => 'bg-violet-400/10 text-violet-400 ring-violet-500/20',
        11 => 'bg-purple-400/10 text-purple-400 ring-purple-500/20',
        12 => 'bg-fuchsia-400/10 text-fuchsia-400 ring-fuchsia-500/20',
        13 => 'bg-pink-400/10 text-pink-400 ring-pink-500/20',
        14 => 'bg-rose-400/10 text-rose-400 ring-rose-500/20',
        15 => 'bg-red-400/10 text-red-400 ring-red-500/20',
        16 => 'bg-orange-400/10 text-orange-400 ring-orange-500/20',
        17 => 'bg-amber-400/10 text-amber-400 ring-amber-500/20',
        default => 'bg-neutral-400/10 text-neutral-400 ring-neutral-500/20',
    };
@endphp

<span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset {{ $color }}">Niveau {{ $level }}</span>
