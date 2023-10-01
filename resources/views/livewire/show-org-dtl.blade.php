<div>
    @if(session()->has('message'))
    <div class="space-y-4">
        <div x-data="{isShow:true}" :class="!isShow && 'opacity-0 transition-opacity duration-300'"
            class="alert flex items-center justify-between overflow-hidden rounded-lg border border-info text-info">
            <div class="flex">
                <div class="bg-info p-3 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="px-4 py-3 sm:px-5">{{ session('message') }}</div>
            </div>
            <div class="px-2">
                <button @click="isShow = false; setTimeout(()=>$root.remove(),300)"
                    class="btn h-7 w-7 rounded-full p-0 font-medium text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
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





    <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-3 mb-4 sm:gap-5 lg:gap-6">
        <div>
            <label class="block">
                <span>اسم المنشأة</span>

            </label>
            <span>
                {{ $org->org_name }}
            </span>


        </div>
        <div>
            <label class="block">
                <span>اسم المالك</span>

            </label>
            {{$org->owner_name}}
        </div>
        <div>
            <label class="block">
                <div class="flex flex-col items-center">


                    <label>
                        صورة مالك المنشأة
                    </label>
                    <div class=" h-24 w-24 ">
                        <div class="group relative">




                            <div class="avatar h-24 w-24 rounded-full">
                                <img class="" src="{{ asset($org->owner_img)   }}" alt="avatar" />
                            </div>





                        </div>

                    </div>

                </div>
        </div>

        <div>
            <label class="block" style="margin-top: -15mm">
                <span> النشاط التجاري</span>

            </label>
            {{ $org->org_type->name }}



        </div>

        <div>
            <label class="block " style="margin-top: -15mm">
                <span> رقم المالك</span>

            </label>
            {{ $org->owner_phone }}

        </div>

        <div>

        </div>

        <div>
            <span> تاريخ بدء النشاط </span>
            <label class="relative flex">
                {{ $org->start_date }}
            </label>

        </div>

        <div>
            <label class="block">
                <span>نوع البطاقة</span>

            </label>
            {{ $org->card_type }}
        </div>

        <div>

        </div>
        <div>
            <label class="block">
                <span>نوع المبنى</span>

            </label>
            {{ $org->building_type->name }}
        </div>
        <div>
            <label class="block ">
                <span> رقم البطاقة</span>

            </label>
            {{ $org->card_number }}
        </div>
        <div>
            <label class="block">
                <span>{{ $org->fire_ext }} يمتلك طفاية حريق </span>

            </label>
        </div>
        <div>

        </div>
    </div>
    <div>
        <label class="block">
            <span> المرفقات </span>

        </label>
        البطاقة الشخصية
        @if ($org->personal_card)
        متواجد
        @else
        غير متواجد
        @endif
        |
        عقد الايجار او فاتورة الكهرباء
        @if ($org->rent_contract)
        متواجد
        @else
        غير متواجد
        @endif
        |
        اللوح الاعلانية
        @if ($org->ad_board)
        متواجد
        @else
        غير متواجد
        @endif
        |
        الرخصة السابقة
        @if ($org->previous_license)
        متواجد
        @else
        غير متواجد
        @endif
        |
        السجل التجاري
        @if ($org->comm_record)
        متواجد
        @else
        غير متواجد
        @endif

    </div>
    <div>
        <div x-data="pages.tables.initGridTableExapmle">
            <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                <div class="gridjs-head">
                    <div class="gridjs-search"><button type="button" x-data x-on:click="$dispatch('open-modal',{name:'add-org-board-modal'})"
                        class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        اضافة  لوحة جديدة 
                    </button></div>
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
                                    <div class="gridjs-th-content"> الطول  </div>
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
                                <td class="gridjs-td"><span><span class="mx-2">{{ $i }}</span></span></td>
                                <td class="gridjs-td"><span><span
                                            class="text-slate-700 dark:text-navy-100 font-medium">{{ $p->billboard->name
                                            }}</span></span>
                                </td>

                                <td class="gridjs-td">{{ $p->height }}</td>
                                <td class="gridjs-td">{{ $p->wideth }}</td>
                                
                                <td class="gridjs-td">{{ ($p->height)*($p->wideth) }}</td>
                                <td class="gridjs-td">{{ $p->count }}</td>
                                <td class="gridjs-td">{{ $p->billboard->price }}</td>
                                <td class="gridjs-td">{{ ($p->height)*($p->wideth)*($p->billboard->price)*($p->count) }}</td>
                                <td class="gridjs-td"><span>
                                        <div class="flex justify-center space-x-2">
                                            <button type="button" wire:click='setname({{ $p->id }})' x-data
                                                x-on:click="$dispatch('open-modal',{name:'edit-org-billboard-modal'})"
                                                class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" wire:click='deleteConfirmation({{ $p->id }})' x-data
                                                x-on:click="$dispatch('open-modal',{name:'del-org-billboard-modal'})"
                                                class="btn h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                                <i class="fa fa-trash-  "></i>
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
                        <div class="gridjs-pages"><button tabindex="0" role="button" disabled="" title="Previous"
                                aria-label="Previous" class="">Previous</button><button tabindex="0" role="button"
                                class="gridjs-currentPage" title="Page 1" aria-label="Page 1">1</button><button
                                tabindex="0" role="button" class="" title="Page 2" aria-label="Page 2">2</button><button
                                tabindex="0" role="button" title="Next" aria-label="Next" class="">Next</button></div>
                    </div>
                </div>
                <div id="gridjs-temp" class="gridjs-temp"></div>
            </div>
        </div>
    </div>
    <div wire:ignore.self>
        <x-modaladd title="إضافة  شارع جديد " name="add-org-board-modal">
            @slot('body')
            {{-- <x-slot:body> --}}
                <form>
                    <div class="p-2 space-y-6">
                        <label class="block">
                            <span>  اسم الشارع </span>
                            <input wire:model='name'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="اسم الشارع" type="text" />
                        </label>
                        @error('name')
                        <span class="text-tiny+ text-error">
                            {{ $message }}
                        </span>
                        @enderror
                        <label class="block">
                            <span>  وحدة الجوار </span>
                            <input wire:model='hood_unit_id'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="رسوم النظافة" type="text" />
                        </label>
                        @error('hood_unit_id')
                        <span class="text-tiny+ text-error">
                            {{ $message }}
                        </span>
                        @enderror

                    </div>

                    <!-- Modal footer -->
                    <div class="items-center p-4  border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" data-dismiss="modal"
                            class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            الغاء
                        </button>
                        <button type="button" wire:click.prevent='storeStudentData'
                            class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            حفظ
                        </button>
                    </div>

                </form>
                <div>
                    @if (session('sec'))
                    <span class="text-green-500 text-xs">{{ session('sec') }}</span>

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
        <x-modaladd title="تعديل  شارع " name="edit-org-board-modal">
            {{-- @slot('body') --}}
            <x-slot:body>
                <form>
                    <div class="p-2 space-y-6">
                        <label class="block">
                            <span>  الشارع </span>
                            <input wire:model='edname'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="اسم الشارع" type="text" />
                        </label>
                        @error('edname')
                        <span class="text-tiny+ text-error">
                            {{ $message }}
                        </span>
                        @enderror
                        <label class="block">
                            <span> رسوم النظافة </span>
                            <input wire:model='edhood_unit_id'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="رسوم النظافة" type="text" />
                        </label>
                        @error('edhood_unit_id')
                        <span class="text-tiny+ text-error">
                            {{ $message }}
                        </span>
                        @enderror

                    </div>

                    <!-- Modal footer -->
                    <div class="items-center p-4  border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" data-dismiss="modal"
                            class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            الغاء
                        </button>
                        <button type="button" wire:click.prevent='editStudentData'
                            class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            تعديل
                        </button>
                    </div>

                </form>
                <div>
                    @if (session('sec'))
                    <span class="text-green-500 text-xs">{{ session('sec') }}</span>

                    @endif
                </div>

                {{-- @endslot --}}
            </x-slot:body>
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
            <button wire:click="deleteStudentData"
                class="btn mt-6 bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                نعم انا متأكد
            </button>
        </div>
        @endslot
    </x-modaldel>




























</div>