<div>
    @if(session()->has('message'))
    <div class="space-y-4">
        <div x-data="{isShow:true}" :class="!isShow && 'opacity-0 transition-opacity duration-300'"
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
    <form wire:submit.prevent='store'>
        @csrf
        <span style="font-size: 22px" class="mt-3 mb-3 font-semibold text-slate-800 dark:text-navy-100">بيانات المنشأة
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



                                @if($owner_img )
                                <div class="w-24 h-24 rounded-full avatar">
                                    <img class="" src="{{ $owner_img->temporaryUrl()   }}" alt="avatar" />
                                </div>
                                @else
                                <div class="items-center w-24 h-24 border-2 ">
                                    <div class="mx-auto mt-6 border-4 h-9 w-9">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 " fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                        </svg>
                                    </div>

                                </div>

                                @endif
                                <div
                                    class="absolute top-0 flex items-center justify-center w-full h-full my-auto transition-all duration-300 opacity-0 bg-black/30 group-hover:opacity-100 group-hover:rounded-full">


                                    <label
                                        class="p-0 font-medium text-white btn h-9 w-9 bg-info hover:bg-info-focus hover:shadow-lg hover:shadow-info/50 focus:bg-info-focus active:bg-info-focus/90">
                                        <input wire:model='owner_img' tabindex="-1" type="file" accept="image/* "
                                            class="absolute inset-0 w-full h-full opacity-0 pointer-events-none" />
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
                <label class="block" >
                    <span>نوع النشاط التجاري</span>
                    <select wire:model='org_type_id' class="mt-1.5 "
                        x-init="$el._x_tom = new Tom($el,{sortField: {field: 'text',direction: 'asc'}})">
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
                <label class="block " >
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

            </div>

            <div>
                <span> تاريخ بدء النشاط </span>
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
                <label class="block">
                    <span>نوع البطاقة</span>
                    <select wire:model.defer='card_type' class="mt-1.5 "
                        x-init="$el._x_tom = new Tom($el,{sortField: {field: 'text',direction: 'asc'}})">
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

            </div>
            <div>

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
        <hr>
        <br>
        <span style="font-size: 22px" class="mt-3 mb-3 font-semibold text-slate-800 dark:text-navy-100">بيانات إضافية
            حول
            المنشأة </span>
        <br><br>
        <hr><br>

        <div class="grid grid-cols-1 gap-4 mt-5 sm:grid-cols-3 sm:gap-5 lg:gap-6">

            <div>
                <label class="block">
                    <span>نوع المبنى</span>
                    <select placeholder="....... اختر نوع المبنى ..." name="building_type_id" id="building_type_id"
                        wire:model.defer='building_type_id' class="mt-1.5 w-full "
                        x-init="$el._x_tom = new Tom($el,{sortField: {field: 'text',direction: 'asc'}})">
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
                    <select wire:model='street_id' class="mt-1.5 w-full "
                        x-init="$el._x_tom = new Tom($el,{sortField: {field: 'text',direction: 'asc'}})">>
                        <option value="">اختر </option>
                        @forelse ($streets as $s )
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
        <br>
        <hr>
        <br>
        <span style="font-size: 22px" class="mt-3 mb-3 font-semibold text-slate-800 dark:text-navy-100">
            الملفات المرفقة
        </span>
        <br><br>
        <hr><br>

        <div class="grid grid-cols-1 gap-4 mt-5 sm:grid-cols-2 sm:gap-5 lg:gap-6">
            <div>
                {{-- 1 --}}
                <div class="filepond fp-grid fp-bordered [--fp-grid:4] p-4">
                    <span>ملف البطاقة الشخصية</span>
                    <br>
                    <label
                        class="relative font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <input accept=".pdf" tabindex="-1" type="file" wire:model='personal_card'
                            class="absolute inset-0 w-full h-full opacity-0 pointer-events-none " />
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <i class="text-base fa-solid fa-cloud-arrow-up"></i>
                            <span> (PDF.)
                                @if (!$personal_card)


                                اختر ملف البطاقة الشخصية
                                @endif
                            </span>
                        </div>
                        @if($personal_card)
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
                        <input accept=".pdf" tabindex="-1" type="file" wire:model='previous_license'
                            class="absolute inset-0 w-full h-full opacity-0 pointer-events-none " />
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <i class="text-base fa-solid fa-cloud-arrow-up"></i>
                            <span> (PDF.)
                                @if (!$previous_license)


                                اختر ملف الرخصة السابقة
                                @endif
                            </span>
                        </div>
                        @if($previous_license)
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
                        <input accept=".pdf" tabindex="-1" type="file" wire:model='rent_contract'
                            class="absolute inset-0 w-full h-full opacity-0 pointer-events-none " />
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <i class="text-base fa-solid fa-cloud-arrow-up"></i>
                            <span>
                                @if (!$rent_contract)
                                (PDF.)

                                اختر ملف العقد او الفاتورة
                                @endif
                            </span>
                        </div>
                        @if($rent_contract)
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
                        <input accept=".pdf" tabindex="-1" type="file" wire:model='comm_record'
                            class="absolute inset-0 w-full h-full opacity-0 pointer-events-none " />
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <i class="text-base fa-solid fa-cloud-arrow-up"></i>
                            <span> (PDF.)
                                @if (!$comm_record)


                                اختر ملف السجل التجاري
                                @endif
                            </span>
                        </div>
                        @if($comm_record)
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
                        <input accept=".pdf" tabindex="-1" type="file" wire:model='ad_board'
                            class="absolute inset-0 w-full h-full opacity-0 pointer-events-none " />
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <i class="text-base fa-solid fa-cloud-arrow-up"></i>
                            <span> (PDF.)
                                @if (!$ad_board)


                                اختر ملف اللوحة الاعلانية
                                @endif
                            </span>
                        </div>
                        @if($ad_board)
                        <span class="mx-3">({{ $ad_board->getClientOriginalName() }})</span>
                        @endif

                    </label>
                    @error('ad_board')
                    <span style="color: red" class="invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
            </div>
            <div>
                {{-- @if ($org_type)

                @endif --}}
                <div class="filepond fp-grid fp-bordered [--fp-grid:4] p-4">
                    <span>موافقة الجهة المختصة</span>
                    <br>
                    <label
                        class="relative font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <input accept=".pdf" tabindex="-1" type="file" wire:model='ad_board'
                            class="absolute inset-0 w-full h-full opacity-0 pointer-events-none " />
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <i class="text-base fa-solid fa-cloud-arrow-up"></i>
                            <span> (PDF.)
                                @if (!$ad_board)


                                اختر ملف موافقة الجهة المختصة
                                @endif
                            </span>
                        </div>
                        @if($ad_board)
                        <span class="mx-3">({{ $ad_board->getClientOriginalName() }})</span>
                        @endif

                    </label>
                    @error('ad_board')
                    <span style="color: red" class="invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
            </div>
        </div>








        <button type="submit" class="font-medium text-white btn bg-gradient-to-r from-green-400 to-blue-600">
            اضافة
        </button>



    </form>
</div>
