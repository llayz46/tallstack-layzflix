<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-background-accent-darker border border-neutral-700 rounded-md font-semibold text-xs text-gray-300 uppercase tracking-widest shadow-sm hover:bg-background-accent-hover focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2 dark:focus:ring-offset-background-accent disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
