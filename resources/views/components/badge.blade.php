@props(['tag'])

<{{ $tag }} class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium shadow text-neutral-400 ring-1 backdrop-blur-[2px] bg-background-accent-hover/25 ring-inset ring-background-accent-hover cursor-default">
{{ $slot }}
</{{ $tag }}>
