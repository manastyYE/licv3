<div>

    {{-- <a href="/admin/org/clip/{{ $org->id }}"
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
        <div>

        </div>
    </div>
    <h4 class="text-xl font-semibold text-slate-700 dark:text-navy-100">
        المرفقات
    </h4>
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
                        <button type="button" x-data
                            x-on:click="$dispatch('open-modal',{name:'add-org-clip-modal'})"
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
                                    <div class="gridjs-th-content">  الرقم الالي </div>
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
        <x-modaladd title="إضافة  لوحة لمنشأة{{ $org->org_name }} " name="add-org-clip-modal">
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
                            <input wire:model='ed_billboard_id'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="نوع اللوحة " type="text" />
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




</div>
