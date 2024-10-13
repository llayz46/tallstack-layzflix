<div {{ $attributes->class(['group relative']) }}>
    <div class="absolute left-[calc(50%+20px)] top-[20px] hidden h-px w-[calc(100%-40px)] group-last:hidden sm:block bg-gradient-to-r from-primary-700/75 via-neutral-700 to-primary-700/75"></div>
    <div class="icon relative mx-auto mb-4 flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg border border-primary-600/50 bg-primary-600/10 font-semibold text-primary-600/80">
        {{ $number }}
    </div>
    <p class="prose prose-primary dark:prose-invert prose-sm mx-auto mt-2 max-w-48 px-1 text-center text-neutral-300">
        {{ $slot }}
    </p>
</div>
