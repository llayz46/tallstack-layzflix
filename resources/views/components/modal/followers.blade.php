<div class="relative z-10" role="dialog" aria-modal="true" x-show="followersModal" x-trap.noscroll="followersModal">

    <div class="fixed inset-0 bg-black/35 transition-opacity"
         x-transition:enter="ease-out duration-300" x-show="followersModal"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0" x-cloak></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto p-4 sm:p-6 md:p-20">
        <livewire:followers :$user/>
    </div>
</div>
