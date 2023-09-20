<div wire:ignore.self>
    <form wire:submit.prevent='reloadPage'>
        @csrf
        <span style="font-size: 22px" class=" mt-3 mb-3  font-semibold text-slate-800 dark:text-navy-100">بيانات المنشأة
            ومالكها</span>
        <br><br>
        <hr>

        <div class="row mt-4">
            <div class="col">

                <div>

                    <label class="block">
                        <span>اسم المنشأة</span>
                        <input name="org_name" wire:model='org_name' id="org_name"
                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder="ادخل اسم المنشأة" type="text" />
                    </label>
                    @error('org_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>


                    <label class="block">
                        <span>نوع النشاط التجاري</span>
                        <select  wire:model='org_type_id' class="mt-1.5 "
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
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label> تاريخ بدء النشاط </label>
                    <label class="relative flex">
                        <input wire:model='start_date' x-init="$el._x_flatpickr = flatpickr($el)"
                            class="form-input peer w-full rounded-lg border  border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder=" اختر تاريخ..." type="text" />

                        <span
                            class="pointer-events-none absolute flex h-full w-12 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">

                            <div class="w-12">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors  duration-200"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                        </span>
                    </label>
                </div>

            </div>
            @error('start_date')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col">

            <div>

                <label class="block">
                    <span>اسم المالك</span>
                    <input name="owner_name" wire:model='owner_name' id="owner_name"
                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="ادخل اسم المالك" type="text" />
                </label>
                @error('owner_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div >
                <label class="block">
                    <span> رقم المالك</span>
                    <input name="owner_phone" wire:model='owner_phone' id="owner_phone"
                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="ادخل رقم الهاتف" type="text" />
                </label>
                @error('owner_phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div >
                <label class="block">
                    <span>نوع البطاقة</span>
                    <select wire:model='card_type' class="mt-1.5 "
                        x-init="$el._x_tom = new Tom($el,{sortField: {field: 'text',direction: 'asc'}})">
                        <option value=""> . . اختر النوع</option>


                        <option value="شخصية"> . . شخصية</option>
                        <option value="عائلية"> عائلية</option>
                        <option value="جواز سفر"> . . جواز سفر</option>

                    </select>
                </label>
                @error('card_type')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div >
                
                    <label class="block">
                        <span> رقم البطاقة</span>
                        <input name="card_number" wire:model='card_number' id="card_number"
                          class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="ادخل رقم البطاقة"
                          type="text"
                        />
                      </label>
                @error('card_number')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



        </div>

        <div class="col">
            <div class="flex flex-col items-center">


                <label>
                    صورة مالك المنشأة
                </label>
                <div class=" h-24 w-24 ">
                    <div class="group relative">



                        @if($owner_img )
                        <div class="avatar h-24 w-24 rounded-full">
                            <img class="" src="{{ $owner_img->temporaryUrl()   }}" alt="avatar" />
                        </div>
                        @else
                        <div class=" h-24 w-24  border-2 items-center">
                            <div class="border-4  h-9 w-9 mx-auto mt-4">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                            </div>

                        </div>

                        @endif
                        <div
                            class="absolute top-0 flex h-full w-full items-center justify-center my-auto bg-black/30 opacity-0 transition-all duration-300 group-hover:opacity-100 group-hover:rounded-full">


                            <label
                                class="btn h-9 w-9  bg-info p-0 font-medium text-white hover:bg-info-focus hover:shadow-lg hover:shadow-info/50 focus:bg-info-focus active:bg-info-focus/90">
                                <input wire:model='owner_img' tabindex="-1" type="file" accept="image/* "
                                    class="pointer-events-none absolute inset-0 h-full w-full opacity-0" />
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                            </label>

                        </div>
                    </div>

                </div>
                @error('owner_img')
                <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

        </div>
</div>

<hr>
<br>
<span style="font-size: 22px" class=" mt-3 mb-3  font-semibold text-slate-800 dark:text-navy-100">بيانات إضافية حول
    المنشأة </span>
<br><br>
<hr><br>
<div class="row">
    <div class="col">
        <div>
            
            <label class="block">
                <span>نوع المبنى</span>
                <select
                placeholder="....... اختر نوع المبنى ..."
                name="building_type_id" id="building_type_id" wire:model='building_type_id'
                  class="mt-1.5 w-full "
                  x-init="$el._x_tom = new Tom($el,{sortField: {field: 'text',direction: 'asc'}})"
                >
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
        <div >
            
            <label class="block">
                <span> هل هو مالك المبنى </span>
                <select
                name="isowner" id="isowner" wire:model='isowner'
                placeholder=".......  هل هو مالك المبنى   ..."
                  class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                >
                <option value="لا"> لا </option>
                <option value="نعم"> نعم </option>
                </select>
              </label>
            @error('isowner')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

    </div>
    <div class="col">
        <div class="form-group">
            <label> الشارع</label>
            <select name="street_id" id="street_id" wire:model='street_id' class="form-control select2">
                <option value="">اختر </option>

                @forelse ($streets as $s )
                <option value="{{ $s->id }}">{{ $s->name }} </option>
                @empty
                <option value="">لا توجد اي بيانات </option>
                @endforelse



            </select>
            @error('street_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label>
                وحدة الجوار

            </label>

            <input disabled type="text" name="hood_unit_no" id="hood_unit_no" wire:model='hood_unit_no'
                class="form-control">

            @error('hood_unit_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col">
        <div>

            <label class="block">
                <span>يمتلك طفاية حرق</span>
                <select wire:model='fire_ext'
                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                    <option selected value="لا">لا </option>
                    <option value="نعم">نعم </option>
                </select>
            </label>

        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="filepond fp-grid fp-bordered [--fp-grid:4] p-4">
            <span>ملف البطاقة الشخصية</span>
            <br>
            <label
                class="btn relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <input accept=".pdf" tabindex="-1" type="file" wire:model='personal_card'
                    class="pointer-events-none absolute inset-0 h-full w-full opacity-0 " />
                <div class="flex items-center  space-x-reverse space-x-2">
                    <i class="fa-solid fa-cloud-arrow-up text-base"></i>
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
        <div class="filepond fp-grid fp-bordered [--fp-grid:4] p-4">
            <span> عقد الايجار او فاتورة الكهرباء</span>
            <br>
            <label
                class="btn relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <input accept=".pdf" tabindex="-1" type="file" wire:model='rent_contract'
                    class="pointer-events-none absolute inset-0 h-full w-full opacity-0 " />
                <div class="flex items-center  space-x-reverse space-x-2">
                    <i class="fa-solid fa-cloud-arrow-up text-base"></i>
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
        <div class="filepond fp-grid fp-bordered [--fp-grid:4] p-4">
            <span>صورة اللوحة الاعلانية</span>
            <br>
            <label
                class="btn relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <input accept=".pdf" tabindex="-1" type="file" wire:model='ad_board'
                    class="pointer-events-none absolute inset-0 h-full w-full opacity-0 " />
                <div class="flex items-center  space-x-reverse space-x-2">
                    <i class="fa-solid fa-cloud-arrow-up text-base"></i>
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
    <div class="col">
        <div class="filepond fp-grid fp-bordered [--fp-grid:4] p-4">
            <span> الرخصة السابقة </span>
            <br>
            <label
                class="btn relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <input accept=".pdf" tabindex="-1" type="file" wire:model='previous_license'
                    class="pointer-events-none absolute inset-0 h-full w-full opacity-0 " />
                <div class="flex items-center  space-x-reverse space-x-2">
                    <i class="fa-solid fa-cloud-arrow-up text-base"></i>
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
        <div class="filepond fp-grid fp-bordered [--fp-grid:4] p-4">
            <span> السجل التجاري</span>
            <br>
            <label
                class="btn relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <input accept=".pdf" tabindex="-1" type="file" wire:model='comm_record'
                    class="pointer-events-none absolute inset-0 h-full w-full opacity-0 " />
                <div class="flex items-center  space-x-reverse space-x-2">
                    <i class="fa-solid fa-cloud-arrow-up text-base"></i>
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
</div>
<button type="submit" style="background-color: blue" class="btn btn-primary btn-sm"> اضافة</button>
</form>

</div>