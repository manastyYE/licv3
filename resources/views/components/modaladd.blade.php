<div>
    @props(['title','name'])
    <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-y-auto px-4 py-6 sm:px-5"
     x-data="{show : false ,name : '{{ $name }}'}" x-show="show"
    x-on:open-modal.window="show = ($event.detail.name === name)" x-on:close-modal.window="show = false"
    x-on:close-modal.window="show = false" x-on:keydown.escape.window="show = false" style="display: none;"
    x-transition.duration @keydown.window.escape="showModal = false"
     @keydown.window.escape="showModal = false">
        <div class="absolute inset-0 transition-opacity duration-300 bg-slate-900/60" x-on:click="show = false"
            x-transition:enter="ease-out" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"></div>
        <div class="relative w-full max-w-lg transition-all duration-300 origin-top bg-white rounded-lg dark:bg-navy-700"
            x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
            <div class="flex justify-between px-4 py-3 rounded-t-lg bg-slate-200 dark:bg-navy-800 sm:px-5">
                <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                    {{ $title??'لايوجد عنوان' }}
                </h3>
                {{-- زر اغلاق الموديل --}}
                <button x-on:click="show = false"
                    class="btn -ml-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="px-4 py-4 sm:px-5">

                <div class="mt-4 space-y-4">
                    {{ $body }}

                </div>
            </div>
        </div>
    </div>
</div>
