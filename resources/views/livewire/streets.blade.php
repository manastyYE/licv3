<div>
    <button type="button" x-data x-on:click="$dispatch('open-modal',{name:'add-street-modal'})"
        class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
        اضافة نشاط تجاري
    </button>




    <div>
        <div x-data="pages.tables.initGridTableExapmle">
            <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                <div class="gridjs-head">
                    <div class="gridjs-search"><input type="search" placeholder="ابحث من هنا..."
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
                                    <div class="gridjs-th-content"> الشارع </div>
                                </th>

                                <th data-column-id="email" class="gridjs-th">
                                    <div class="gridjs-th-content"> وحدة الجوار </div>
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
                                            class="text-slate-700 dark:text-navy-100 font-medium">{{ $p->name
                                            }}</span></span>
                                </td>

                                <td class="gridjs-td">{{ $p->hood_unit->no }}</td>
                                <td class="gridjs-td"><span>
                                        <div class="flex justify-center space-x-2">
                                            <button type="button" wire:click='setname({{ $p->id }})' x-data
                                                x-on:click="$dispatch('open-modal',{name:'edit-steet-modal'})"
                                                class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" wire:click='deleteConfirmation({{ $p->id }})' x-data
                                                x-on:click="$dispatch('open-modal',{name:'del-org-type-modal'})"
                                                class="btn h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
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
        <x-modaladd title="إضافة  شارع جديد " name="add-street-modal">
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
        <x-modaladd title="تعديل  شارع " name="edit-steet-modal">
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
                class="btn mt-6 bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                نعم انا متأكد
            </button>
        </div>
        @endslot
    </x-modaldel>

</div>
