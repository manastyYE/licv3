<div>

    {{-- <a href="/admin/org/clip/{{ $org->id }}"
        class="font-medium border btn border-primary text-primary hover:bg-primary hover:text-white focus:bg-primary focus:text-white active:bg-primary/90 dark:border-accent dark:text-accent-light dark:hover:bg-accent dark:hover:text-white dark:focus:bg-accent dark:focus:text-white dark:active:bg-accent/90">
        عرض الحافظة
    </a> --}}
    <div dir="ltr" class="ml-4">
        <button type="button" wire:click='set_org_info()' x-data
            x-on:click="$dispatch('open-modal',{name:'edit-org-data'})"
            class="w-8 h-8 p-0 btn text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
            <i class="fa fa-edit"></i>
        </button>
    </div>
    @if (session()->has('message'))
        <div class="space-y-4">
            <div x-data="{ isShow: true }" :class="!isShow && 'opacity-0 transition-opacity duration-300'"
                class="flex items-center justify-between overflow-hidden border rounded-lg alert border-info text-info">
                <div class="flex">
                    <div class="p-3 text-white bg-info">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="px-4 py-3 sm:px-5">{{ session('message') }}</div>
                </div>
                <div class="px-2">
                    <button @click="isShow = false; setTimeout(()=>$root.remove(),300)"
                        class="p-0 font-medium rounded-full btn h-7 w-7 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>




        </div>
    @endif


    <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
        بيانات المنشأة
    </h2>





    <div class="grid grid-cols-1 gap-4 mt-5 mb-4 sm:grid-cols-3 sm:gap-5 lg:gap-6">
        <div>
            <label class="block">
                <span>اسم المنشأة</span>

            </label>
            <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                {{ $org->org_name }}
            </h5>



        </div>
        <div>
            <label class="block">
                <span>اسم المالك</span>

            </label>
            <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                {{ $org->owner_name }}
            </h5>

        </div>
        <div>
            <label class="block">
                <div class="flex flex-col items-center">


                    <label>
                        صورة مالك المنشأة
                    </label>
                    <div class="w-24 h-24 ">
                        <div class="relative group">

                            {{-- {{ asset($org->owner_img)}} --}}


                            <div class="w-24 h-24 rounded-full avatar">
                                <img class="" src="{{ asset($org->owner_img) }}" alt="avatar" />
                            </div>





                        </div>

                    </div>

                </div>
        </div>

        <div>
            <label class="block" style="margin-top: -15mm">
                <span> النشاط التجاري</span>
                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->org_type->name }}
                </h5>
            </label>





        </div>

        <div>
            <label class="block " style="margin-top: -15mm">
                <span> رقم المالك</span>
                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->owner_phone }}
                </h5>
            </label>


        </div>

        <div>

        </div>

        <div>
            <span> تاريخ بدء النشاط </span>
            <label class="relative flex">

                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->start_date }}
                </h5>
            </label>

        </div>

        <div>
            <label class="block">
                <span>نوع البطاقة</span>
                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->card_type }}
                </h5>
            </label>

        </div>

        <div>

        </div>
        <div>
            <label class="block">
                <span>نوع المبنى</span>
                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->building_type->name }}
                </h5>
            </label>

        </div>
        <div>
            <label class="block ">
                <span> رقم البطاقة</span>
                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->card_number }}
                </h5>
            </label>

        </div>
        <div>
            <label class="block">

                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->fire_ext }} يمتلك طفاية حريق
                </h5>
            </label>
        </div>

    </div>
    <div dir="ltr" class="ml-4">
        <button type="button" wire:click='set_org_info()' x-data
            x-on:click="$dispatch('open-modal',{name:'edit-org-files'})"
            class="w-8 h-8 p-0 btn text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
            <i class="fa fa-edit"></i>
        </button>
    </div>
    <h4 class="text-xl font-semibold text-slate-700 dark:text-navy-100">
        المرفقات
    </h4>
    <button
    x-data
    x-on:click="$dispatch('open-modal',{name:'show-org-files'})"
        class="btn border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
        عرض المرفقات
    </button>
    <div class="grid grid-cols-1 gap-4 mt-5 mb-4 sm:grid-cols-3 sm:gap-5 lg:gap-6">

        <label class="block">
            البطاقة الشخصية
            @if ($org->personal_card)
                <button x-data x-on:click="$dispatch('open-modal',{name:'show-personal-card'})">
                    <img src="{{ asset('img/yes.png') }}" class="h-6 mr-4">
                </button>
            @else
                <img src="{{ asset('img/no.png') }}" class="h-6 mr-4">
            @endif
        </label>
        <label class="block">
            عقد الايجار او فاتورة الكهرباء
            @if ($org->rent_contract)
                <img src="{{ asset('img/yes.png') }}" class="h-6 mr-4">
            @else
                <img src="{{ asset('img/no.png') }}" class="h-6 mr-4">
            @endif
        </label>
        <label class="block">
            اللوح الاعلانية
            @if ($org->ad_board)
                <img src="{{ asset('img/yes.png') }}" class="h-6 mr-4">
            @else
                <img src="{{ asset('img/no.png') }}" class="h-6 mr-4">
            @endif
        </label>
        <label class="block">
            الرخصة السابقة
            @if ($org->previous_license)
                <img src="{{ asset('img/yes.png') }}" class="h-6 mr-4">
            @else
                <img src="{{ asset('img/no.png') }}" class="h-6 mr-4">
            @endif
        </label>
        <label class="block">
            السجل التجاري
            @if ($org->comm_record)
                <img src="{{ asset('img/yes.png') }}" class="h-6 mr-4">
            @else
                <img src="{{ asset('img/no.png') }}" class="h-6 mr-4">
            @endif
        </label>




    </div>

    <div>
        <div x-data="pages.tables.initGridTableExapmle">
            <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                <div class="gridjs-head">
                    <div class="gridjs-search">
                        <button type="button" x-data
                            x-on:click="$dispatch('open-modal',{name:'add-org-board-modal'})"
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            اضافة لوحة جديدة
                        </button>
                    </div>
                </div>
                <div class="gridjs-wrapper" style="height: auto;">
                    <table role="grid" class="gridjs-table" style="height: auto;">
                        <thead class="gridjs-thead">
                            <tr class="gridjs-tr">
                                <th class="gridjs-th ">
                                    <div class="gridjs-th-content">#</div>
                                </th>
                                <th data-column-id="name" class="gridjs-th">
                                    <div class="gridjs-th-content"> نوع اللوحة </div>
                                </th>

                                <th data-column-id="email" class="gridjs-th">
                                    <div class="gridjs-th-content"> الطول </div>
                                </th>

                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content">العرض</div>
                                </th>


                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content"> م </div>
                                </th>
                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content"> الكمية </div>
                                </th>
                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content">سعر المتر</div>
                                </th>
                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content">الاجمالي</div>
                                </th>
                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content">العمليات</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="gridjs-tbody">
                            <?php $i = 0; ?>
                            @if ($type->count() > 0)
                                @foreach ($type as $p)
                                    <?php $i++; ?>
                                    <tr class="gridjs-tr">
                                        <td class="gridjs-td"><span><span
                                                    class="mx-2">{{ $i }}</span></span></td>
                                        <td class="gridjs-td"><span><span
                                                    class="font-medium text-slate-700 dark:text-navy-100">{{ $p->billboard->name }}</span></span>
                                        </td>

                                        <td class="gridjs-td">{{ $p->height }}</td>
                                        <td class="gridjs-td">{{ $p->width }}</td>

                                        <td class="gridjs-td">{{ $p->height * $p->width }}</td>
                                        <td class="gridjs-td">{{ $p->count }}</td>
                                        <td class="gridjs-td">{{ $p->billboard->price }}</td>
                                        <td class="gridjs-td">
                                            {{ $p->height * $p->width * $p->billboard->price * $p->count }}
                                        </td>
                                        <td class="gridjs-td"><span>
                                                <div class="flex justify-center space-x-2">
                                                    <button type="button" wire:click='setname({{ $p->id }})'
                                                        x-data
                                                        x-on:click="$dispatch('open-modal',{name:'edit-org-board-modal'})"
                                                        class="w-8 h-8 p-0 btn text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button"
                                                        wire:click='deleteConfirmation({{ $p->id }})' x-data
                                                        x-on:click="$dispatch('open-modal',{name:'del-org-billboard-modal'})"
                                                        class="w-8 h-8 p-0 btn text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                                        <i class="fa fa-trash- "></i>
                                                    </button>
                                                </div>
                                            </span></td>
                                    </tr>
                                @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>
                <div class="gridjs-footer">
                    <div class="gridjs-pagination">
                        <div role="status" aria-live="polite" class="gridjs-summary" title="Page 1 of 2">Showing
                            <b>1</b> to <b>10</b> of <b>15</b> results
                        </div>
                        <div class="gridjs-pages"><button tabindex="0" role="button" disabled=""
                                title="Previous" aria-label="Previous" class="">Previous</button><button
                                tabindex="0" role="button" class="gridjs-currentPage" title="Page 1"
                                aria-label="Page 1">1</button><button tabindex="0" role="button" class=""
                                title="Page 2" aria-label="Page 2">2</button><button tabindex="0" role="button"
                                title="Next" aria-label="Next" class="">Next</button></div>
                    </div>
                </div>
                <div id="gridjs-temp" class="gridjs-temp"></div>
            </div>
        </div>
    </div>
    <br>
    <div>
        <h3>
            الحافظة الالية
        </h3>
        <div x-data="pages.tables.initGridTableExapmle">

            <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                <div class="gridjs-head">
                    <div class="gridjs-search">
                        @if (!$clip)
                        <button type="button" x-data x-on:click="$dispatch('open-modal',{name:'add-org-clip-modal'})"
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            انشاء حافظة
                        </button>
                        @endif
                        @if ($clip && !$can_have_clip)
                            <button type="button"
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            لا يمكن انشاء حافظة يجب تسديد الرسوم الغير مدفوعة
                            </button>
                        @else
                        <button type="button" x-data x-on:click="$dispatch('open-modal',{name:'add-org-clip-modal'})"
                        class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        انشاء حافظة
                        </button>
                        @endif

                    </div>
                </div>
                <div class="gridjs-wrapper" style="height: auto;">
                    <table role="grid" class="gridjs-table" style="height: auto;">
                        <thead class="gridjs-thead">
                            <tr class="gridjs-tr">
                                <th class="gridjs-th ">
                                    <div class="gridjs-th-content">#</div>
                                </th>
                                <th data-column-id="name" class="gridjs-th">
                                    <div class="gridjs-th-content"> الرقم الالي </div>
                                </th>

                                <th data-column-id="email" class="gridjs-th">
                                    <div class="gridjs-th-content"> الحالة </div>
                                </th>

                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content"> تاريخ الانشاء </div>
                                </th>


                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content"> أنشأها المستخدم </div>
                                </th>
                                <th class="gridjs-th">
                                    طباعة كرت الرخصة
                                </th>
                            </tr>
                        </thead>
                        <tbody class="gridjs-tbody">
                            <?php $i = 0; ?>
                            @if ($clip->count() > 0)
                                @foreach ($clip as $p)
                                    <?php $i++; ?>
                                    <a href="/admin/org/clip/{{ $p->id }}">
                                        <tr class="gridjs-tr">

                                            <span>
                                                <td class="gridjs-td"><span><span
                                                            class="mx-2">{{ $i }}</span></span></td>


                                                <td class="gridjs-td">
                                                    <a href="/admin/org/clip/{{ $p->id }}">
                                                        {{ $p->id }}
                                                    </a>
                                                </td>
                                                <td class="gridjs-td">{{ $p->clip_status }}</td>

                                                <td class="gridjs-td">{{ $p->created_at }}</td>
                                                <td class="gridjs-td">{{ $p->admin->fullname }}</td>
                                                <td class="gridjs-td">
                                                    <a
                                                    @if ($p->clip_status == 'مدفوعة' )
                                                    href="/admin/report/card/{{ $p->id }}"
                                                    @else

                                                    @endif

                                                        class="font-medium border btn border-primary text-primary hover:bg-primary hover:text-white focus:bg-primary focus:text-white active:bg-primary/90 dark:border-accent dark:text-accent-light dark:hover:bg-accent dark:hover:text-white dark:focus:bg-accent dark:focus:text-white dark:active:bg-accent/90">
                                                        طباعة كرت الرخصة
                                                    </a>
                                                </td>

                                            </span>




                                            {{-- <td class="gridjs-td"><span>
                                                <div class="flex justify-center space-x-2">
                                                    <button type="button" wire:click='setname({{ $p->id }})'
                                                        x-data
                                                        x-on:click="$dispatch('open-modal',{name:'edit-org-billboard-modal'})"
                                                        class="w-8 h-8 p-0 btn text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button"
                                                        wire:click='deleteConfirmation({{ $p->id }})' x-data
                                                        x-on:click="$dispatch('open-modal',{name:'del-org-billboard-modal'})"
                                                        class="w-8 h-8 p-0 btn text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                                        <i class="fa fa-trash- "></i>
                                                    </button>
                                                </div>
                                            </span>
                                        </td> --}}
                                        </tr>
                                    </a>
                                @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>
                <div class="gridjs-footer">
                    <div class="gridjs-pagination">
                        <div role="status" aria-live="polite" class="gridjs-summary" title="Page 1 of 2">Showing
                            <b>1</b> to <b>10</b> of <b>15</b> results
                        </div>
                        <div class="gridjs-pages"><button tabindex="0" role="button" disabled=""
                                title="Previous" aria-label="Previous" class="">Previous</button><button
                                tabindex="0" role="button" class="gridjs-currentPage" title="Page 1"
                                aria-label="Page 1">1</button><button tabindex="0" role="button" class=""
                                title="Page 2" aria-label="Page 2">2</button><button tabindex="0" role="button"
                                title="Next" aria-label="Next" class="">Next</button></div>
                    </div>
                </div>
                <div id="gridjs-temp" class="gridjs-temp"></div>
            </div>
        </div>
    </div>
    @if ($office_id != 4)
    <div>
        <h3>
            حافظة مكنب {{ $org->org_type->office->name }}
        </h3>
        <div x-data="pages.tables.initGridTableExapmle">

            <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                <div class="gridjs-head">
                    <div class="gridjs-search">
                        <button type="button" x-data x-on:click="$dispatch('open-modal',{name:'add-outher-clip-modal'})"
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            انشاء حافظة
                        </button>
                    </div>
                </div>
                <div class="gridjs-wrapper" style="height: auto;">
                    <table role="grid" class="gridjs-table" style="height: auto;">
                        <thead class="gridjs-thead">
                            <tr class="gridjs-tr">
                                <th class="gridjs-th ">
                                    <div class="gridjs-th-content">#</div>
                                </th>
                                <th data-column-id="name" class="gridjs-th">
                                    <div class="gridjs-th-content"> الرقم الالي </div>
                                </th>

                                <th data-column-id="email" class="gridjs-th">
                                    <div class="gridjs-th-content"> الحالة </div>
                                </th>

                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content"> تاريخ الانشاء </div>
                                </th>


                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content"> أنشأها المستخدم </div>
                                </th>

                            </tr>
                        </thead>
                        <tbody class="gridjs-tbody">
                            <?php $i = 0; ?>
                            @if ($oclip->count() > 0)
                                @foreach ($oclip as $p)
                                    <?php $i++; ?>
                                    <a href="/admin/org/clip/{{ $p->id }}">
                                        <tr class="gridjs-tr">

                                            <span>
                                                <td class="gridjs-td"><span><span
                                                            class="mx-2">{{ $i }}</span></span></td>


                                                <td class="gridjs-td">
                                                    <a href="/admin/org/outherclip/{{ $p->id }}">
                                                        {{ $p->id }}
                                                    </a>
                                                </td>
                                                <td class="gridjs-td">{{ $p->clip_status }}</td>

                                                <td class="gridjs-td">{{ $p->created_at }}</td>
                                                <td class="gridjs-td">{{ $p->admin->fullname }}</td>


                                            </span>




                                            {{-- <td class="gridjs-td"><span>
                                                <div class="flex justify-center space-x-2">
                                                    <button type="button" wire:click='setname({{ $p->id }})'
                                                        x-data
                                                        x-on:click="$dispatch('open-modal',{name:'edit-org-billboard-modal'})"
                                                        class="w-8 h-8 p-0 btn text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button"
                                                        wire:click='deleteConfirmation({{ $p->id }})' x-data
                                                        x-on:click="$dispatch('open-modal',{name:'del-org-billboard-modal'})"
                                                        class="w-8 h-8 p-0 btn text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                                        <i class="fa fa-trash- "></i>
                                                    </button>
                                                </div>
                                            </span>
                                        </td> --}}
                                        </tr>
                                    </a>
                                @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>
                <div class="gridjs-footer">
                    <div class="gridjs-pagination">
                        <div role="status" aria-live="polite" class="gridjs-summary" title="Page 1 of 2">Showing
                            <b>1</b> to <b>10</b> of <b>15</b> results
                        </div>
                        <div class="gridjs-pages"><button tabindex="0" role="button" disabled=""
                                title="Previous" aria-label="Previous" class="">Previous</button><button
                                tabindex="0" role="button" class="gridjs-currentPage" title="Page 1"
                                aria-label="Page 1">1</button><button tabindex="0" role="button" class=""
                                title="Page 2" aria-label="Page 2">2</button><button tabindex="0" role="button"
                                title="Next" aria-label="Next" class="">Next</button></div>
                    </div>
                </div>
                <div id="gridjs-temp" class="gridjs-temp"></div>
            </div>
        </div>
    </div>
    @endif


    <div wire:ignore.self>
        <x-modaladd title="إضافة  لوحة لمنشأة{{ $org->org_name }} " name="add-org-board-modal">
            @slot('body')
                {{-- <x-slot:body> --}}
                <form>
                    <div class="p-2 space-y-6">
                        <label class="block">
                            <span> نوع اللوحة </span>
                            <select wire:model='billboard_id'
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                <option value=""> اختر نوع اللوحة </option>
                                @forelse ($bill as $b)
                                    <option value="{{ $b->id }}">{{ $b->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </label>
                        @error('billboard_id')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> الطول </span>
                            <input wire:model='height'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder=" الطول" type="text" />
                        </label>
                        @error('height')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> العرض </span>
                            <input wire:model='wideth'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="العرض" type="text" />
                        </label>
                        @error('wideth')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> العدد </span>
                            <input wire:model='count'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder=" العدد" type="text" />
                        </label>
                        @error('count')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror


                    </div>

                    <!-- Modal footer -->
                    <div class="items-center p-4 border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" data-dismiss="modal"
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            الغاء
                        </button>
                        <button type="button" wire:click.prevent='storeOrgBillBoardData'
                            class="font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            حفظ
                        </button>
                    </div>

                </form>
                <div>
                    @if (session('sec'))
                        <span class="text-xs text-green-500">{{ session('sec') }}</span>
                    @endif
                </div>

            @endslot
            {{--
            </x-slot:body> --}}
            {{-- @slot('footer')

            @endslot --}}
        </x-modaladd>
    </div>

    <div wire:ignore.self>
        <x-modaladd title="إضافة  حافظة لمنشأة{{ $org->org_name }} " name="add-org-clip-modal">
            @slot('body')
                {{-- <x-slot:body> --}}
                <form>
                    <div class="p-2 space-y-6">
                        <label class="block">
                            <span> الرسوم المحلية </span>
                            <input wire:model='local_fee'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder=" ادخل الرسوم المحلية" type="text" />
                        </label>
                        @error('local_fee')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> رسوم البوابة الالكترونية </span>
                            <input wire:model='el_gate'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="ادخل رسوم البوابة الالكترونية" type="text" />
                        </label>
                        @error('el_gate')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> التحسين </span>
                            <input wire:model='clean'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder=" ادخل رسوم التحسين" type="text" />
                        </label>
                        @error('clean')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> رسوم نظافة المهن </span>
                            <input wire:model='clean_pay'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder=" ادخل رسوم نظافة المهن" type="text" />
                        </label>
                        @error('clean_pay')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror




                    </div>

                    <!-- Modal footer -->
                    <div class="items-center p-4 border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" data-dismiss="modal"
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            الغاء
                        </button>
                        <button type="button" wire:click.prevent='storeClipData'
                            class="font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            حفظ
                        </button>
                    </div>

                </form>
                <div>
                    @if (session('sec'))
                        <span class="text-xs text-green-500">{{ session('sec') }}</span>
                    @endif
                </div>

            @endslot
            {{--
            </x-slot:body> --}}
            {{-- @slot('footer')

            @endslot --}}
        </x-modaladd>
    </div>

    <div wire:ignore.self>
        <x-modaladd title="تعديل  لوحة لمنشأة{{ $org->org_name }} " name="edit-org-board-modal">
            @slot('body')
                {{-- <x-slot:body> --}}
                <form>
                    <div class="p-2 space-y-6">
                        <label class="block">
                            <span> نوع اللوحة </span>
                            <select wire:model='ed_billboard_id'
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                <option value=""> اختر نوع اللوحة </option>
                                @forelse ($bill as $b)
                                    <option value="{{ $b->id }}">{{ $b->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </label>
                        @error('ed_billboard_id')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> الطول </span>
                            <input wire:model='ed_height'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder=" الطول" type="text" />
                        </label>
                        @error('ed_height')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> العرض </span>
                            <input wire:model='ed_wideth'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="العرض" type="text" />
                        </label>
                        @error('ed_wideth')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> العدد </span>
                            <input wire:model='ed_count'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder=" العدد" type="text" />
                        </label>
                        @error('ed_count')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror


                    </div>

                    <!-- Modal footer -->
                    <div class="items-center p-4 border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" data-dismiss="modal"
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            الغاء
                        </button>
                        <button type="button" wire:click.prevent='editOrgBillboardData'
                            class="font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            حفظ
                        </button>
                    </div>

                </form>
                <div>
                    @if (session('sec'))
                        <span class="text-xs text-green-500">{{ session('sec') }}</span>
                    @endif
                </div>

            @endslot
            {{--
            </x-slot:body> --}}
            {{-- @slot('footer')

            @endslot --}}
        </x-modaladd>
    </div>



    <x-modaldel wire:ignore.self name="del-org-board-modal">
        @slot('delbody')
            <div class="mt-4">
                <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                    تأكيد الحذف
                </h2>
                <p class="mt-2">
                    هل انت متأكد من انك تريد حذف هذه البيانات
                </p>
                <button wire:click="deleteOrgBillboardData"
                    class="mt-6 font-medium text-white btn bg-success hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                    نعم انا متأكد
                </button>
            </div>
        @endslot
    </x-modaldel>


    <div wire:ignore.self>

        <x-modaladd title=" nbgoeh;ofk " name="show-personal-card">
            @slot('body')
                {{-- <x-slot:body> --}}



                <h1>PDF.js Previous/Next example</h1>

                <p>Please use <a href="https://mozilla.github.io/pdf.js/getting_started/#download"><i>official
                            releases</i></a> in production environments.</p>

                <div>
                    <button id="prev">Previous</button>
                    <button id="next">Next</button>
                    &nbsp; &nbsp;
                    <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
                </div>

                <canvas id="the-canvas"></canvas>
            @endslot
            {{--
            </x-slot:body> --}}
            {{-- @slot('footer')

            @endslot --}}
        </x-modaladd>
    </div>


    <div wire:ignore.self>

        <x-modaladd title=" تعديل بيانات المنشأة" name="edit-org-data">
            @slot('body')
                {{-- <x-slot:body> --}}
                <form wire:submit.prevent='update_org_info'>
                    @csrf
                    <span style="font-size: 22px" class="mt-3 mb-3 font-semibold text-slate-800 dark:text-navy-100">بيانات
                        المنشأة
                        ومالكها</span>
                    <br><br>
                    <hr>





                    <div class="grid grid-cols-1 gap-4 mt-5 mb-4 sm:grid-cols-3 sm:gap-5 lg:gap-6">
                        <div>
                            <label class="block">
                                <span>اسم المنشأة</span>
                                <input name="org_name" wire:model.defer='org_name' id="org_name"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="ادخل اسم المنشأة" type="text" />
                            </label>
                            @error('org_name')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror

                        </div>
                        <div>
                            <label class="block">
                                <span>اسم المالك</span>
                                <input name="owner_name" wire:model.defer='owner_name' id="owner_name"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="ادخل اسم المالك" type="text" />
                            </label>
                            @error('owner_name')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block">
                                <div class="flex flex-col items-center">


                                    <label>
                                        صورة مالك المنشأة
                                    </label>
                                    <div class="w-24 h-24 ">
                                        <div class="relative group">



                                            @if ($owner_img)
                                                <div class="w-24 h-24 rounded-full avatar">
                                                    <img class="" src="{{ $owner_img->temporaryUrl() }}"
                                                        alt="avatar" />
                                                </div>
                                            @else
                                                <div class="items-center w-24 h-24 border-2 ">
                                                    <div class="mx-auto mt-6 border-4 h-9 w-9">

                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 "
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                        </svg>
                                                    </div>

                                                </div>
                                            @endif
                                            <div
                                                class="absolute top-0 flex items-center justify-center w-full h-full my-auto transition-all duration-300 opacity-0 bg-black/30 group-hover:opacity-100 group-hover:rounded-full">


                                                <label
                                                    class="p-0 font-medium text-white btn h-9 w-9 bg-info hover:bg-info-focus hover:shadow-lg hover:shadow-info/50 focus:bg-info-focus active:bg-info-focus/90">
                                                    <input wire:model='owner_img' tabindex="-1" type="file"
                                                        accept="image/* "
                                                        class="absolute inset-0 w-full h-full opacity-0 pointer-events-none" />
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                    </svg>
                                                </label>

                                            </div>
                                        </div>

                                    </div>
                                    @error('owner_img')
                                        <span class="text-tiny+ text-error">{{ $message }}</span>
                                    @enderror

                                </div>
                        </div>

                        <div>
                            <label class="block">
                                <span>نوع النشاط التجاري</span>
                                <select wire:model='org_type_id' class="mt-1.5 " x-init="$el._x_tom = new Tom($el, { sortField: { field: 'text', direction: 'asc' } })">
                                    <option value=""> . اختر النوع</option>

                                    @forelse ($org_types as $t)
                                        <option value="{{ $t->id }}">.... . {{ $t->name }}</option>
                                    @empty
                                        <option value=""> لا توجد اي نشاط تجاري</option>
                                    @endforelse
                                </select>
                            </label>


                            @error('org_type_id')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block ">
                                <span> رقم المالك</span>
                                <input name="owner_phone" wire:model.defer='owner_phone' id="owner_phone"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="ادخل رقم الهاتف" type="text" />
                            </label>
                            @error('owner_phone')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>


                        <div>
                            <label class="block">
                                <span>نوع البطاقة</span>
                                <select wire:model.defer='card_type' class="mt-1.5 " x-init="$el._x_tom = new Tom($el, { sortField: { field: 'text', direction: 'asc' } })">
                                    <option value=""> . . اختر النوع</option>


                                    <option value="شخصية"> . . شخصية</option>
                                    <option value="عائلية"> عائلية</option>
                                    <option value="جواز سفر"> . . جواز سفر</option>

                                </select>
                            </label>
                            @error('card_type')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>



                        <div>
                            <label class="block ">
                                <span> رقم البطاقة</span>
                                <input name="card_number" wire:model.defer='card_number' id="card_number"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="ادخل رقم البطاقة" type="text" />
                            </label>
                            @error('card_number')
                                <span class="text-tiny+ text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>












                    <br>
                    <span style="font-size: 22px" class="mt-3 mb-3 font-semibold text-slate-800 dark:text-navy-100">بيانات
                        إضافية
                        حول
                        المنشأة </span>
                    <br><br>
                    <hr><br>

                    <div class="grid grid-cols-1 gap-4 mt-5 sm:grid-cols-3 sm:gap-5 lg:gap-6">

                        <div>
                            <label class="block">
                                <span>نوع المبنى</span>
                                <select placeholder="....... اختر نوع المبنى ..." name="building_type_id"
                                    id="building_type_id" wire:model.defer='building_type_id' class="mt-1.5 w-full "
                                    x-init="$el._x_tom = new Tom($el, { sortField: { field: 'text', direction: 'asc' } })">
                                    <option value="">اختر</option>
                                    @forelse ($building_types as $t)
                                        <option value="{{ $t->id }}"> {{ $t->name }}</option>
                                    @empty
                                        <option value=""> لا توجد بيانات </option>
                                    @endforelse

                                </select>
                            </label>
                            @error('building_type_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block">
                                <span> الشارع</span>
                                <select wire:model='street_id' class="mt-1.5 w-full " x-init="$el._x_tom = new Tom($el, { sortField: { field: 'text', direction: 'asc' } })">>
                                    <option value="">اختر </option>
                                    @forelse ($streets as $s)
                                        <option value="{{ $s->id }}">{{ $s->name }} </option>
                                    @empty
                                        <option value="">لا توجد اي بيانات </option>
                                    @endforelse
                                </select>
                            </label>
                            @error('street_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block">
                                <span>يمتلك طفاية حرق</span>
                                <select wire:model.defer='fire_ext'
                                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                    <option value="اختر "> اختر </option>
                                    <option value="لا">لا </option>
                                    <option value="نعم">نعم </option>
                                </select>
                            </label>
                        </div>
                        <div>
                            {{-- 1 --}}


                            <label class="block">
                                <span> هل هو مالك المبنى </span>
                                <select name="isowner" id="isowner" wire:model.defer='isowner'
                                    placeholder=".......  هل هو مالك المبنى   ..."
                                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                    <option value="">اختر </option>
                                    <option value="لا"> لا </option>
                                    <option value="نعم"> نعم </option>
                                </select>
                            </label>
                            @error('isowner')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div>


                            <label class="block">
                                <span> وحدة الجوار </span>
                                <input disabled name="hood_unit_no" wire:model='hood_unit_no' id="hood_unit_no"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    type="text" />
                            </label>

                            @error('hood_unit_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>











                    <button type="submit" class="font-medium text-white btn bg-gradient-to-r from-green-400 to-blue-600">
                        اضافة
                    </button>



                </form>




            @endslot
            {{--
            </x-slot:body> --}}
            {{-- @slot('footer')

            @endslot --}}
        </x-modaladd>
    </div>
    <div wire:ignore.self>

        <x-modaladd title=" تعديل الملفات المرفقة المنشأة" name="edit-org-files">
            @slot('body')
                {{-- <x-slot:body> --}}
                <form wire:submit.prevent='edit_files'>
                    @csrf
                    <span style="font-size: 22px" class="mt-3 mb-3 font-semibold text-slate-800 dark:text-navy-100">
                        الصور المرفقة
                    </span>
                    <br><br>
                    <hr><br>

                    <div class="grid grid-cols-1 gap-4 mt-5 sm:grid-cols-2 sm:gap-5 lg:gap-6">
                        <div>
                            {{-- 1 --}}
                            <div class="filepond fp-grid fp-bordered [--fp-grid:4] p-4">
                                <span>صورة البطاقة الشخصية</span>
                                <br>
                                <label
                                    class="relative font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <input accept="image/*" tabindex="-1" type="file" wire:model='personal_card'
                                        class="absolute inset-0 w-full h-full opacity-0 pointer-events-none " />
                                    <div class="flex items-center space-x-2 space-x-reverse">
                                        <i class="text-base fa-solid fa-cloud-arrow-up"></i>
                                        <span>
                                            @if (!$personal_card)
                                                اختر صورة البطاقة الشخصية
                                            @endif
                                        </span>
                                    </div>
                                    @if ($personal_card)
                                        <span class="mx-3">({{ $personal_card->getClientOriginalName() }})</span>
                                    @endif

                                </label>
                                @error('personal_card')
                                    <span style="color: red" class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div>
                            {{-- 2 --}}
                            <div class="filepond fp-grid fp-bordered [--fp-grid:4] p-4">
                                <span> الرخصة السابقة </span>
                                <br>
                                <label
                                    class="relative font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <input accept="image/*" tabindex="-1" type="file" wire:model='previous_license'
                                        class="absolute inset-0 w-full h-full opacity-0 pointer-events-none " />
                                    <div class="flex items-center space-x-2 space-x-reverse">
                                        <i class="text-base fa-solid fa-cloud-arrow-up"></i>
                                        <span>
                                            @if (!$previous_license)
                                                اختر صورة الرخصة السابقة
                                            @endif
                                        </span>
                                    </div>
                                    @if ($previous_license)
                                        <span class="mx-3">({{ $previous_license->getClientOriginalName() }})</span>
                                    @endif

                                </label>
                                @error('previous_license')
                                    <span style="color: red" class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div>
                            {{-- 1 --}}
                            <div class="filepond fp-grid fp-bordered [--fp-grid:4] p-4">
                                <span> عقد الايجار او فاتورة الكهرباء</span>
                                <br>
                                <label
                                    class="relative font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <input accept="image/*" tabindex="-1" type="file" wire:model='rent_contract'
                                        class="absolute inset-0 w-full h-full opacity-0 pointer-events-none " />
                                    <div class="flex items-center space-x-2 space-x-reverse">
                                        <i class="text-base fa-solid fa-cloud-arrow-up"></i>
                                        <span>
                                            @if (!$rent_contract)
                                                اختر صورة العقد او الفاتورة
                                            @endif
                                        </span>
                                    </div>
                                    @if ($rent_contract)
                                        <span class="mx-3">({{ $rent_contract->getClientOriginalName() }})</span>
                                    @endif

                                </label>
                                @error('rent_contract')
                                    <span style="color: red" class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div>
                            {{-- 2 --}}
                            <div class="filepond fp-grid fp-bordered [--fp-grid:4] p-4">
                                <span> السجل التجاري</span>
                                <br>
                                <label
                                    class="relative font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <input accept="image/*" tabindex="-1" type="file" wire:model='comm_record'
                                        class="absolute inset-0 w-full h-full opacity-0 pointer-events-none " />
                                    <div class="flex items-center space-x-2 space-x-reverse">
                                        <i class="text-base fa-solid fa-cloud-arrow-up"></i>
                                        <span>
                                            @if (!$comm_record)
                                                اختر صورة السجل التجاري
                                            @endif
                                        </span>
                                    </div>
                                    @if ($comm_record)
                                        <span class="mx-3">({{ $comm_record->getClientOriginalName() }})</span>
                                    @endif

                                </label>
                                @error('comm_record')
                                    <span style="color: red" class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div>
                            {{-- 1 --}}
                            <div class="filepond fp-grid fp-bordered [--fp-grid:4] p-4">
                                <span>صورة اللوحة الاعلانية</span>
                                <br>
                                <label
                                    class="relative font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <input accept="image/*" tabindex="-1" type="file" wire:model='ad_board'
                                        class="absolute inset-0 w-full h-full opacity-0 pointer-events-none " />
                                    <div class="flex items-center space-x-2 space-x-reverse">
                                        <i class="text-base fa-solid fa-cloud-arrow-up"></i>
                                        <span>
                                            @if (!$ad_board)
                                                اختر صورة اللوحة الاعلانية
                                            @endif
                                        </span>
                                    </div>
                                    @if ($ad_board)
                                        <span class="mx-3">({{ $ad_board->getClientOriginalName() }})</span>
                                    @endif

                                </label>
                                @error('ad_board')
                                    <span style="color: red" class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div>
                            @if ($org->org_type->office_id != 4)
                                <div class="filepond fp-grid fp-bordered [--fp-grid:4] p-4">
                                    <span>موافقة الجهة المختصة</span>
                                    <br>
                                    <label
                                        class="relative font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        <input accept="image/*" tabindex="-1" type="file" wire:model='outher'
                                            class="absolute inset-0 w-full h-full opacity-0 pointer-events-none " />
                                        <div class="flex items-center space-x-2 space-x-reverse">
                                            <i class="text-base fa-solid fa-cloud-arrow-up"></i>
                                            <span>
                                                @if (!$outher)
                                                    اختر صورة موافقة الجهة المختصة
                                                @endif
                                            </span>
                                        </div>
                                        @if ($outher)
                                            <span class="mx-3">({{ $outher->getClientOriginalName() }})</span>
                                        @endif

                                    </label>
                                    @error('outher')
                                        <span style="color: red" class="invalid-feedback">{{ $message }}</span>
                                    @enderror

                                </div>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="font-medium text-white btn bg-gradient-to-r from-green-400 to-blue-600">
                        حفظ
                    </button>



                </form>




            @endslot
            {{--
            </x-slot:body> --}}
            {{-- @slot('footer')

            @endslot --}}
        </x-modaladd>
    </div>
    <div wire:ignore.self>
        <x-modaladd title="  عرض الملفات المرفقة" name="show-org-files">
            @slot('body')
            <div class="card lg:p-6">


                <!-- Blog Post -->
                @if ($org->personal_card)
                    <div class=" font-inter text-base text-slate-600 dark:text-navy-200">
                        <h1 class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl">
                            صورة البطاقة الشخصية
                        </h1>

                        <img class="mt-5 h-80 w-full rounded-lg object-cover object-center" src="{{ asset($org->personal_card) }}"
                            alt="image">


                    </div>
                @endif
                <!-- Blog Post -->
                @if ($org->rent_contract)
                    <div class=" font-inter text-base text-slate-600 dark:text-navy-200">
                        <h1 class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl">
                            صورة عقد الايجار
                        </h1>

                        <img class="mt-5 h-80 w-full rounded-lg object-cover object-center" src="{{ asset($org->rent_contract) }}"
                            alt="image">


                    </div>
                @endif
                <!-- Blog Post -->
                @if ($org->ad_board)
                    <div class=" font-inter text-base text-slate-600 dark:text-navy-200">
                        <h1 class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl">
                            صورة اللوحة الاعلانية
                        </h1>

                        <img class="mt-5 h-80 w-full rounded-lg object-cover object-center" src="{{ asset($org->ad_board) }}"
                            alt="image">


                    </div>
                @endif
                <!-- Blog Post -->
                @if ($org->previous_license)
                    <div class=" font-inter text-base text-slate-600 dark:text-navy-200">
                        <h1 class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl">
                            صورة الرخصة السابقة
                        </h1>

                        <img class="mt-5 h-80 w-full rounded-lg object-cover object-center" src="{{ asset($org->previous_license) }}"
                            alt="image">


                    </div>
                @endif
                <!-- Blog Post -->
                @if ($org->comm_record)
                    <div class=" font-inter text-base text-slate-600 dark:text-navy-200">
                        <h1 class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl">
                            صورة السجل التجاري
                        </h1>

                        <img class="mt-5 h-80 w-full rounded-lg object-cover object-center" src="{{ asset($org->comm_record) }}"
                            alt="image">


                    </div>
                @endif
                <!-- Blog Post -->
                @if ($org->outher)
                    <div class=" font-inter text-base text-slate-600 dark:text-navy-200">
                        <h1 class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl">
                            صورة موافقة الجهة المختصة
                        </h1>

                        <img class="mt-5 h-80 w-full rounded-lg object-cover object-center" src="{{ asset($org->outher) }}"
                            alt="image">


                    </div>
                @endif


                <!-- Footer Blog Post -->
                <div class="mt-5 flex space-x-3 space-x-reverse">

                </div>
            </div>
            @endslot
        </x-modaladd>
    </div>
    @if ($office_id != 4)
    <div wire:ignore.self>
        <x-modaladd title="إضافة  حافظة مكتب {{ $org->org_type->office->name }} " name="add-outher-clip-modal">
            @slot('body')
                {{-- <x-slot:body> --}}
                <form>
                    <div class="p-2 space-y-6">
                        <label class="block">
                            <span> الرسوم  </span>
                            <input wire:model='price'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder=" ادخل الرسوم " type="text" />
                        </label>
                        @error('price')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> الرسوم الاخرى </span>
                            <input wire:model='other_price'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="ادخل الرسوم الاخرى" type="text" />
                        </label>
                        @error('other_price')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror





                    </div>

                    <!-- Modal footer -->
                    <div class="items-center p-4 border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" data-dismiss="modal"
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            الغاء
                        </button>
                        <button type="button" wire:click.prevent='storeOtClipData'
                            class="font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            حفظ
                        </button>
                    </div>

                </form>
                <div>
                    @if (session('sec'))
                        <span class="text-xs text-green-500">{{ session('sec') }}</span>
                    @endif
                </div>

            @endslot
            {{--
            </x-slot:body> --}}
            {{-- @slot('footer')

            @endslot --}}
        </x-modaladd>
    </div>
    @endif







</div>
