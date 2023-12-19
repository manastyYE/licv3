<div>

    {{-- Care about people's approval and you will be their prisoner. --}}
    <div>
        <div class="is-scrollbar-hidden min-w-full overflow-x-auto rounded-lg border  dark:border-navy-900">
            <div class="flex h-8 w-full items-center justify-center bg-slate-200 dark:bg-navy-500">
                <p class="text-xl">بيانات تعريفية</p>
            </div>
            <table class="w-full text-right border-collapse c ">

                <tbody>
                    <tr>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            الاسم رباعياً
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{$clip->org->owner_name}}
                        </td>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            رقم التلفون
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{$clip->org->owner_phone}}
                        </td>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            اسم الشهرة
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{$clip->org->org_name}}
                        </td>


                    </tr>
                    <tr>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            نوع النشاط
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{$clip->org->org_type->name}}
                        </td>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            العنوان
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{$clip->org->addrees}}
                        </td>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            الحي
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            الصناعي
                        </td>


                    </tr>
                </tbody>
            </table>
        </div>
        <div class="is-scrollbar-hidden min-w-full overflow-x-auto rounded-lg border  dark:border-navy-900">
            <div class="flex h-8 w-full items-center justify-center bg-slate-200 dark:bg-navy-500">
                <p class="text-xl">بيانات اللوحة الدعائية </p>
            </div>
            <table class="w-full text-right border-collapse c ">

                <tbody>
                    <tr>
                        <div
                            class="flex h-7  w-full items-center justify-center bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5   ">
                            <p class="text-xl">بيانات اللوحة </p>
                        </div>

                    </tr>
                    <tr>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            امامي
                        </td>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            جانبي
                        </td>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            جداري
                        </td>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            سطحية
                        </td>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            حروف
                        </td>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            لواصق
                        </td>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            غيرها
                        </td>




                    </tr>
                    <tr>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            @if ($clip->infront_count)
                                {{ $clip->infront_count }}
                            @else
                                0
                            @endif

                            {{-- امامي --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            @if ($clip->sideof_count)
                                {{ $clip->sideof_count }}
                            @else
                                0
                            @endif
                            {{-- جانبي --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            @if ($clip->wall_count)
                                {{ $clip->wall_count }}
                            @else
                                0
                            @endif
                            {{-- جداري --}}
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            @if ($clip->sideof_count)
                                {{ $clip->sideof_count }}
                            @else
                                0
                            @endif
                            {{-- سطحية --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            @if ($clip->glass_stickers)
                                {{ $clip->glass_stickers }}
                            @else
                                0
                            @endif
                            {{-- لواصق على الزجاج --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            @if ($clip->door_stickers)
                                {{ $clip->door_stickers }}
                            @else
                                0
                            @endif
                            {{-- لواصق على الابواب --}}
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="is-scrollbar-hidden min-w-full overflow-x-auto rounded-lg border  dark:border-navy-900">
            <div class="flex h-8 w-full items-center justify-center bg-slate-200 dark:bg-navy-500">
                <p class="text-xl"> بيانات مالية مستحقة </p>
            </div>
            <table class="w-full text-right border-collapse c ">

                <tbody>
                    <tr>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            الرسوم
                        </td>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            المبلغ
                        </td>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            ارقام السندات
                        </td>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            التاريخ
                        </td>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            ملاحظات
                        </td>








                    </tr>
                    <tr>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            رسوم محلية
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{ $clip->local_fee }}
                            {{-- المبلغ --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            <label class="block">
                                <span>   </span>
                                <input wire:model='local_reseve'
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder=" ادخل رقم سند الرسم المحلية" type="text" />
                            </label>
                            {{-- رقم السند --}}
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            <label class="relative flex">
                                <input wire:model.defer='local_reseve_date' x-init="$el._x_flatpickr = flatpickr($el)"
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
                            {{-- التاريخ --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            <label class="block">
                                <span>   </span>
                                <input wire:model='local_reseve_note'
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder=" " type="text" />
                            </label>
                            {{-- ملاحظات --}}
                        </td>

                    </tr>
                    <tr>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            أخرى
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{ $clip->el_gate }}
                            {{-- المبلغ --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">

                            {{-- رقم السند --}}
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">

                            {{-- التاريخ --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            <label class="block">
                                <span>   </span>
                                <input wire:model='el_gate_reseve_note'
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder=" " type="text" />
                            </label>
                            {{-- ملاحظات --}}
                        </td>

                    </tr>
                    <tr>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            دعاية واعلان
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{ $clip->total_ad }}
                            {{-- المبلغ --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            <label class="block">
                                <span>   </span>
                                <input wire:model='ad_reseve'
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder=" ادخل رقم سند رسوم الدعاية والاعلان" type="text" />
                            </label>
                            {{-- رقم السند --}}
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            <label class="relative flex">
                                <input wire:model='ad_reseve_date' x-init="$el._x_flatpickr = flatpickr($el)"
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
                            {{-- التاريخ --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            <label class="block">
                                <span>   </span>
                                <input wire:model='ad_reseve_note'
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="" type="text" />
                            </label>
                            {{-- ملاحظات --}}
                        </td>

                    </tr>
                    <tr>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            نظافة
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{ $clip->clean_pay }}
                            {{-- المبلغ --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            <label class="block">
                                <span>   </span>
                                <input wire:model='ad_reseve'
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder=" ادخل رقم سند رسوم النظافة" type="text" />
                            </label>
                            {{-- رقم السند --}}
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            <label class="relative flex">
                                <input wire:model='ad_reseve_date' x-init="$el._x_flatpickr = flatpickr($el)"
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
                            {{-- التاريخ --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            <label class="block">
                                <span>   </span>
                                <input wire:model='ad_reseve_note'
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="" type="text" />
                            </label>
                            {{-- ملاحظات --}}
                        </td>

                    </tr>
                    <tr>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            نظافة المهن
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                            {{-- المبلغ --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                            {{-- رقم السند --}}
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                            {{-- التاريخ --}}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                            {{-- ملاحظات --}}
                        </td>

                    </tr>
                    <tr>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            الاجمالي
                        </td>

                            <td>
                                {{ $clip->total_ad + $clip->local_fee + $clip->el_gate + $clip->clean_pay }}
                                {{-- الاجمالي --}}
                            </td>




                    </tr>

                </tbody>
            </table>
            <button type="button"

            wire:click='update_clip'
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            حفظ  وطباعة
                        </button>
        </div>
    </div>
</div>
