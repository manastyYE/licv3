<div>
    <label class="block">
        <span> نوع التقرير </span>
        <select wire:model='report_type'
            class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
            <option value="">
                اختر نوع التقرير
            </option>
            <option value="1">
                الكل
            </option>
            <option value="2">
                المنشأت التي دفعت الرسوم
            </option>
            <option value="3">
                المنشأت التي لم تدفه الرسوم
            </option>
        </select>
    </label>
    <button wire:click='show'
        class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
        عرض
    </button>
</div>
