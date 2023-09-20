<div>
  @props(['name'])
    <div
        class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
        x-data="{show : false ,name : '{{ $name }}'}" x-show="show"
    x-on:open-modal.window="show = ($event.detail.name === name)" x-on:close-modal.window="show = false"
    x-on:close-modal.window="show = false" x-on:keydown.escape.window="show = false" style="display: none;"
    x-transition.duration @keydown.window.escape="showModal = false"
      >
        <div
          class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300"
          x-on:click="show = false"
          x-show="showModal"
          x-transition:enter="ease-out"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="ease-in"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
        ></div>
        <div
          class="relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5"
          x-show="showModal"
          x-transition:enter="ease-out"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="ease-in"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="inline h-28 w-28 text-alart"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
            ></path>
          </svg>
          {{ $delbody }}
          
        </div>
      </div>
</div>