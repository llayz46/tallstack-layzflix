<div {{ $attributes->class(['relative pl-6 border-l']) }} style="border-image:linear-gradient(#B31D3F, #07070e) 1 100% / 1 / 0 stretch;">
    <h4 class="font-semibold text-gray-300">
        <div class="flex justify-center items-center mb-2 p-1 size-8 relative bg-gradient-to-t from-background-normal to-primary-900 rounded-md text-primary-600">
            <div class="absolute size-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 -z-10 p-px box-content inset-0 rounded-lg bg-gradient-to-t from-primary-800/20 to-primary-600"></div>
            {{ $svg }}
        </div>
        {{ $title }}
    </h4>
    <p class="text-neutral-400">{{ $description }}</p>
</div>
