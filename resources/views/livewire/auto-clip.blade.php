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
                            {{$org->owner_name}}
                        </td>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            رقم التلفون
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{$org->owner_phone}}
                        </td>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            اسم الشهرة
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{$org->org_name}}
                        </td>


                    </tr>
                    <tr>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            نوع النشاط
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{$org->org_type->name}}
                        </td>
                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            العنوان
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{$org->addrees}}
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
                            {{ $board1['count2'] }}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{ $board1['count1'] }}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{ $board1['count6'] }}
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{ $board1['count4'] }}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{ $board1['count5'] }}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{ $board1['count4'] }}
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
                            رسوم محل
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            3
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>

                    </tr>
                    <tr>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            أخرى
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            3
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>

                    </tr>
                    <tr>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            دعاية واعلان
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{ $total }}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>

                    </tr>
                    <tr>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            نظافة
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            {{ $org->org_type->price }}
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>

                    </tr>
                    <tr>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            نظافة المهن
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            3
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>

                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            0
                        </td>

                    </tr>
                    <tr>

                        <td
                            class="whitespace-nowrap border border-slate-900 bg-info px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            الاجمالي
                        </td>

                            <td>
                                {{ ($total + $org->org_type->price) }}
                            </td>




                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
