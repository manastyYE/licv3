<div>

    {{-- <a href="/admin/org/clip/{{$org->id}}"
        class="font-medium border btn border-primary text-primary hover:bg-primary hover:text-white focus:bg-primary focus:text-white active:bg-primary/90 dark:border-accent dark:text-accent-light dark:hover:bg-accent dark:hover:text-white dark:focus:bg-accent dark:focus:text-white dark:active:bg-accent/90">
        عرض الحافظة
    </a> --}}
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
            <label class="block" style="">
                <span> النشاط التجاري</span>
                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->org_type->name }}
                </h5>
            </label>

        </div>





        <div>
            <label class="block " style="">
                <span> رقم المالك</span>
                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->street->name }}
                </h5>
            </label>
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
            <label class="block " style="">
                <span>  الملاحظة</span>
                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->note }}
                </h5>
            </label>
        </div>

        @if (isset($org->log_y))
        <div>
            <label class="block " style="">
                <span>  خطوط الطول</span>
                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->log_y }}
                </h5>
            </label>
        </div>
        @endif

        @if (isset($org->log_x))
        <div>
            <label class="block " style="">
                <span> دوائر العرض</span>
                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->log_x }}
                </h5>
            </label>
        </div>
        @endif
    </div>
        {{-- <div>

        </div> --}}

        {{-- <div>
            <span> تاريخ بدء النشاط </span>
            <label class="relative flex">

                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->start_date }}
                </h5>
            </label>

        </div> --}}

        {{-- <div>
            <label class="block">
                <span>نوع البطاقة</span>
                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->card_type }}
                </h5>
            </label>

        </div> --}}

        {{-- <div>

        </div> --}}

        {{-- <div>
            <label class="block ">
                <span> رقم البطاقة</span>
                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->card_number }}
                </h5>
            </label>

        </div> --}}
        {{-- <div>
            <label class="block">

                <h5 class="font-semibold text-md text-slate-700 dark:text-navy-100">
                    {{ $org->fire_ext }} يمتلك طفاية حريق
                </h5>
            </label>
        </div> --}}
        {{-- <div>

        </div> --}}
    {{-- <h4 class="text-xl font-semibold text-slate-700 dark:text-navy-100">
        المرفقات
    </h4>
    <div class="grid grid-cols-1 gap-4 mt-5 mb-4 sm:grid-cols-3 sm:gap-5 lg:gap-6">

        <label class="block">
            البطاقة الشخصية
            @if ($org->personal_card)
                <img src="{{ asset('img/yes.png') }}" class="h-6 mr-4">
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




    </div> --}}
    <div>
        <div x-data="pages.tables.initGridTableExapmle">
            <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                <div class="gridjs-head">
                    <div class="gridjs-search">
                        {{-- <button type="button" x-data
                            x-on:click="$dispatch('open-modal',{name:'add-org-board-modal'})"
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            اضافة لوحة جديدة
                        </button> --}}
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
                                {{-- <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content">العمليات</div>
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody class="gridjs-tbody">
                            <?php $i = 0; ?>
                            @if ($org_billBoards->count() > 0)
                                @foreach ($org_billBoards as $p)
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
    <a
    {{-- href="/admin/org/clip/{{$org->id}}" --}}
        class="font-medium border btn border-primary text-primary hover:bg-primary hover:text-white focus:bg-primary focus:text-white active:bg-primary/90 dark:border-accent dark:text-accent-light dark:hover:bg-accent dark:hover:text-white dark:focus:bg-accent dark:focus:text-white dark:active:bg-accent/90">
        اكمال بيانات المنشأة
    </a>









</div>
