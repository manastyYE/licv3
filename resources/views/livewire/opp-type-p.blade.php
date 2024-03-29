<div>
    <button type="button" x-data x-on:click="$dispatch('open-modal',{name:'add-org-type-modal'})"
        class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
        اضافة نشاط تجاري
    </button>




    <div>
        <div x-data="pages.tables.initGridTableExapmle">
            <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                <div class="gridjs-head">
                    <div class="gridjs-search"><input wire:model='search' type="search" placeholder="ابحث من هنا..."
                            aria-label="ابحث من هنا..." class="gridjs-input gridjs-search-input"></div>
                </div>
                <div class="gridjs-wrapper" style="height: auto;">
                    <table role="grid" class="gridjs-table" style="height: auto;">
                        <thead class="gridjs-thead">
                            <tr class="gridjs-tr">
                                <th class="gridjs-th ">
                                    <div class="gridjs-th-content">#</div>
                                </th>
                                <th data-column-id="name" class="gridjs-th">
                                    <div class="gridjs-th-content">نوع النشاط التجاري</div>
                                </th>

                                <th data-column-id="email" class="gridjs-th">
                                    <div class="gridjs-th-content">رسوم النظافة</div>
                                </th>
                                <th data-column-id="email" class="gridjs-th">
                                    <div class="gridjs-th-content">الرسوم المحلية</div>
                                </th>
                                <th data-column-id="email" class="gridjs-th">
                                    <div class="gridjs-th-content"> القطاع</div>
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
                                                    class="font-medium text-slate-700 dark:text-navy-100">{{ $p->name }}</span></span>
                                        </td>

                                        <td class="gridjs-td">{{ $p->price }}</td>
                                        <td class="gridjs-td">{{ $p->local_fee }}</td>
                                        <td class="gridjs-td">{{ $p->office->name }}</td>
                                        <td class="gridjs-td"><span>
                                                <div class="flex justify-center space-x-2">
                                                    <button type="button" wire:click='setname({{ $p->id }})'
                                                        x-data
                                                        x-on:click="$dispatch('open-modal',{name:'edit-org-type-modal'})"
                                                        class="w-8 h-8 p-0 btn text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button"
                                                        wire:click='deleteConfirmation({{ $p->id }})' x-data
                                                        x-on:click="$dispatch('open-modal',{name:'del-org-type-modal'})"
                                                        class="w-8 h-8 p-0 btn text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </span></td>
                                    </tr>
                                @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>



            </div>

        </div>

    </div>
    <div class="w-full">
        {{ $type->links() }}
    </div>

    <div wire:ignore.self>
        <x-modaladd title="إضافة نشاط تجاري " name="add-org-type-modal">
            @slot('body')
                {{-- <x-slot:body> --}}
                <form>
                    <div class="p-2 space-y-6">
                        <label class="block">
                            <span> القطاع </span>
                            <select wire:model='office_id'
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                <option value=""> اختر قطاع...</option>
                                @forelse ($off as $o)
                                    <option value="{{ $o->id }}"> {{ $o->name }} </option>
                                @empty
                                @endforelse
                            </select>
                        </label>
                        @error('office_id')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> النشاط التجاري </span>
                            <input wire:model='name'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="اسم النشاط التجاري" type="text" />
                        </label>
                        @error('name')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> رسوم النظافة </span>
                            <input wire:model='price'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="رسوم النظافة" type="text" />
                        </label>
                        @error('price')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> الرسوم الحلية </span>
                            <input wire:model='local_fee'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="ادخل الرسوم المحلية" type="text" />
                        </label>
                        @error('local_fee')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    <!-- Modal footer -->
                    <div class="items-center p-4 border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" x-on:click="show = false"
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            الغاء
                        </button>
                        <button type="button" wire:click.prevent='storeStudentData'
                            class="font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            تأكيد
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
        <x-modaladd title="تعديل نشاط تجاري " name="edit-org-type-modal">
            {{-- @slot('body') --}}
            <x-slot:body>
                <form>
                    <div class="p-2 space-y-6">
                        <label class="block">
                            <span> القطاع </span>
                            <select wire:model='ed_office_id'
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                <option value=""> اختر قطاع...</option>
                                @forelse ($off as $o)


                                        <option value="{{ $o->id }}"> {{ $o->name }} </option>


                                @empty
                                <option value=""> لا توجد اي قطاعات...</option>
                                @endforelse
                            </select>
                        </label>
                        @error('ed_office_id')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> النشاط التجاري </span>
                            <input wire:model='edname'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="اسم النشاط التجاري" type="text" />
                        </label>
                        @error('edname')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> رسوم النظافة </span>
                            <input wire:model='edprice'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="رسوم النظافة" type="text" />
                        </label>
                        @error('edprice')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> الرسوم المحلية </span>
                            <input wire:model='ed_local_fee'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="ادخل الرسوم المحلية هنا" type="text" />
                        </label>
                        @error('ed_local_fee')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Modal footer -->
                    <div class="items-center p-4 border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" x-on:click="show = false"
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            الغاء
                        </button>
                        <button type="button" wire:click.prevent='editStudentData'
                            class="font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            تأكيد
                        </button>
                    </div>

                </form>
                <div>
                    @if (session('sec'))
                        <span class="text-xs text-green-500">{{ session('sec') }}</span>
                    @endif
                </div>

                {{-- @endslot --}}
            </x-slot:body>
            {{-- @slot('footer')

            @endslot --}}
        </x-modaladd>
    </div>



    <x-modaldel wire:ignore.self name="del-org-type-modal">
        @slot('delbody')
            <div class="mt-4">
                <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                    تأكيد الحذف
                </h2>
                <p class="mt-2">
                    هل انت متأكد من انك تريد حذف هذه البيانات
                </p>
                <button wire:click="deleteStudentData"
                    class="mt-6 font-medium text-white btn bg-success hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                    نعم انا متأكد
                </button>
            </div>
        @endslot
    </x-modaldel>

</div>
