<div>

    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <h3>
        تقرير يومي بتاريخ
    </h3>
    <div class="grid grid-cols-1 gap-4 mt-5 mb-4 sm:grid-cols-3 sm:gap-5 lg:gap-6">




        <div>
            <span> التاريخ </span>
            <label class="relative flex">
                <input wire:model.defer='start_date' x-init="$el._x_flatpickr = flatpickr($el)"
                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder=" اختر تاريخ..." type="text" />
                <span
                    class="absolute flex items-center justify-center w-10 h-full pointer-events-none text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-colors duration-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </span>
            </label>
            @error('start_date')
            <span class="text-tiny+ text-error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button wire:click='showDayly'
        class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
        عرض
        </button>
        </div>

        <div>

        </div>
        <div>

        </div>
        <div>
            
        </div>
    </div>
</div>
