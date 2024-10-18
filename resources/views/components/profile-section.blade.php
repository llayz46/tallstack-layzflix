<div {{ $attributes }}>
    <div class="flex justify-between">
        <div>
            <h2 class="text-base font-semibold leading-8 text-primary-600">{{ $title }}</h2>
            <p class="text-sm text-gray-300">{{ $description }}</p>
        </div>
        {{ $button }}
    </div>
    <div class="mt-2 border-t border-background-accent-hover pt-5">
        {{ $slot }}
    </div>
</div>
