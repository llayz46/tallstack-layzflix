@props(['tag'])

<{{ $tag }} class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium shadow text-neutral-400 ring-1 ring-inset ring-background-accent-hover cursor-default">
{{ $slot }}
</{{ $tag }}>
