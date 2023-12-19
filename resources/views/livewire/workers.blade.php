<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <button type="button"
        class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
        x-data x-on:click="$dispatch('open-modal',{ name : 'add-worker-modal'})">اضافة مفتش </button>
    <br>
    <hr>


    <div>
        <div x-data="pages.tables.initGridTableExapmle">
            <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                <div class="gridjs-head">
                    <div class="gridjs-search"><input type="search" placeholder="Type a keyword..."
                            aria-label="Type a keyword..." class="gridjs-input gridjs-search-input"></div>
                </div>
                <div class="gridjs-wrapper" style="height: auto;">
                    <table role="grid" class="gridjs-table" style="height: auto;">
                        <thead class="gridjs-thead">
                            <tr class="gridjs-tr">
                                <th data-column-id="id" class="gridjs-th gridjs-th-sort" tabindex="0">
                                    <div class="gridjs-th-content">#</div><button tabindex="-1"
                                        aria-label="Sort column ascending" title="Sort column ascending"
                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                </th>
                                <th data-column-id="name" class="gridjs-th gridjs-th-sort" tabindex="0">
                                    <div class="gridjs-th-content">
                                        الاسم الكامل @auth

                                        @endauth
                                    </div><button tabindex="-1" aria-label="Sort column ascending"
                                        title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                </th>
                                <th data-column-id="name" class="gridjs-th gridjs-th-sort" tabindex="0">
                                    <div class="gridjs-th-content">
                                        اسم المستخدم
                                    </div><button tabindex="-1" aria-label="Sort column ascending"
                                        title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                </th>

                                <th data-column-id="name" class="gridjs-th gridjs-th-sort" tabindex="0">
                                    <div class="gridjs-th-content">
                                        رقم الهاتف
                                    </div><button tabindex="-1" aria-label="Sort column ascending"
                                        title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                </th>
                                <th data-column-id="name" class="gridjs-th gridjs-th-sort" tabindex="0">
                                    <div class="gridjs-th-content">
                                        المديرية
                                    </div><button tabindex="-1" aria-label="Sort column ascending"
                                        title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                </th>
                                <th data-column-id="name" class="gridjs-th gridjs-th-sort" tabindex="0">
                                    <div class="gridjs-th-content">
                                        المكتب
                                    </div><button tabindex="-1" aria-label="Sort column ascending"
                                        title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                </th>

                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content">العمليات</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="gridjs-tbody">
                            <?php $i = 0; ?>
                            @if ($workers->count() > 0)
                                @foreach ($workers as $p)
                                    <?php $i++; ?>
                                    <tr class="gridjs-tr">
                                        <td class="gridjs-td"><span><span
                                                    class="mx-2">{{ $i }}</span></span></td>
                                        <td class="gridjs-td"><span><span
                                                    class="font-medium text-slate-700 dark:text-navy-100">{{ $p->fullname }}</span></span>
                                        </td>

                                        <td class="gridjs-td">{{ $p->username }}</td>
                                        <td class="gridjs-td">{{ $p->phone }}</td>
                                        <td class="gridjs-td">{{ $p->directorate->name }}</td>
                                        <td class="gridjs-td">{{ $p->office->name }}</td>
                                        <td class="gridjs-td"><span>
                                                <div class="flex justify-center space-x-2">

                                                    <button type="button" wire:click='setname({{ $p->id }})'
                                                        x-data
                                                        x-on:click="$dispatch('open-modal',{name:'edit-worker-modal'})"
                                                        class="w-8 h-8 p-0 btn text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button wire:click='deleteConfirmation({{ $p->id }})' x-data
                                                        x-on:click="$dispatch('open-modal',{name:'del-worker-modal'})"
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
                <div class="gridjs-footer">
                    <div class="gridjs-pagination">
                        <div role="status" aria-live="polite" class="gridjs-summary" title="Page 1 of 2">Showing
                            <b>1</b> to <b>10</b> of <b>15</b> results
                        </div>
                        <div class="gridjs-pages"><button tabindex="0" role="button" disabled="" title="Previous"
                                aria-label="Previous" class="">Previous</button><button tabindex="0"
                                role="button" class="gridjs-currentPage" title="Page 1"
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
        <x-modaladd title="اضافة مفتش جديد " name="add-worker-modal">
            @slot('body')
                <form>
                    <div class="p-2 space-y-6">
                        <label class="block">
                            <span> الاسم الكامل </span>
                            <input wire:model='fullname'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="   ادخل الاسم الكامل هنا  " type="text" />
                        </label>
                        @error('fullname')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <div class="grid grid-cols-2 gap-3">
                        <div>
                        <label class="block">
                            <span>  اسم المستخدم </span>
                            <input wire:model='username'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="   ادخل اسم الممستخدم هنا  " type="text" />
                        </label>
                        @error('username')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        </div>
                        <div>
                            <label class="block">
                                <span> رقم الهاتف </span>
                                <input wire:model='phone' name="user_phone"
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="  ادخل رقم الهاتف الخاص بالمفتش  " type="text" />
                            </label>
                            @error('phone')
                                <span class="text-tiny+ text-error">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                        <label class="block">
                            <span> كلمة المرور </span>
                            <input wire:model='password' name="user_password"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="  ادخل كلمة المرور الخاصة بالمفتش  " type="password" />
                        </label>
                        @error('password')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        </div>
                        <div>
                        <label class="block" >
                            <span> المكتب </span>
                            <select wire:model='office_id' class="mt-1.5 " x-init="$el._x_tom = new Tom($el, { sortField: { field: 'text', direction: 'asc' } })">
                                <option value=""> . اختر المكتب </option>

                                @forelse ($office as $of)
                                    <option value="{{ $of->id }}">.... . {{ $of->name }}</option>
                                @empty
                                    <option value=""> لا توجد اي مكاتب</option>
                                @endforelse
                            </select>
                        </label>
                        @error('office_id')
                        <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                        {{-- <label class="block" >
                            <span> الحي </span>
                            <select wire:model='hood_id' class="mt-1.5 " x-init="$el._x_tom = new Tom($el, { sortField: { field: 'text', direction: 'asc' } })">
                                <option value=""> . اختر الحي </option>

                                @forelse ($hood as $hoo)
                                    <option value="{{ $hoo->id }}">.... . {{ $hoo->name }}</option>
                                @empty
                                    <option value=""> لا توجد اي احياء</option>
                                @endforelse
                            </select>
                        </label>


                        @error('hood_id')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror --}}

            <label class="block mt-3 mbt">
                <span>وحدات الجوار</span>
                <select x-init="$el._tom = new Tom($el,{
                plugins: ['remove_button'],
                create: true,
                onItemRemove: function (val) {
                $notification({text:`${val} حذف`})  }   })" wire:model.defer="hood_unit"
                    wire:loading.class="opacity-50" wire:target="selectedsubsec" class="mt-1.5 w-full  font-medium"
                    multiple placeholder=" اختر وحدات الجوار الخاصه بالمفتش ..." autocomplete="off">


                    @forelse ( $hood_units as $hu )
                    <option value="{{ $hu->id}}">{{ $hu->no }}</option>
                    @empty
                    <option >يرجى اختيار الحي اولاً</option>
                    @endforelse


                </select>
                @error('hood_unit')
                <span class="text-tiny+ text-error">{{ $message }}</span>
                @enderror
            </label>

                    </div>

                    <!-- Modal footer -->
                    <div class="items-center p-4 border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" x-on:click="show = false"
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            الغاء
                        </button>
                        <button type="button" wire:click.prevent='save'
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
            {{-- @slot('footer')

            @endslot --}}
        </x-modaladd>
    </div>

    <div wire:ignore.self>
        <x-modaladd title="  تعديل بيانات المفتش " name="edit-worker-modal">
            @slot('body')
                <form>
                    <div class="p-2 space-y-6">
                        <label class="block">
                            <span> الاسم الكامل </span>
                            <input wire:model='fullname'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="   ادخل الاسم الكامل هنا  " type="text" />
                        </label>
                        @error('fullname')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span>  اسم المستخدم </span>
                            <input wire:model='username'
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="   ادخل اسم الممستخدم هنا  " type="text" />
                        </label>
                        @error('username')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> رقم الهاتف </span>
                            <input wire:model='phone' name="user_phone"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="  ادخل رقم الهاتف الخاص بالمفتش  " type="text" />
                        </label>
                        @error('phone')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block">
                            <span> كلمة المرور </span>
                            <input wire:model='password' name="user_password"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="  ادخل كلمة المرور الخاصة بالمفتش  " type="password" />
                        </label>
                        @error('password')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                        <label class="block" >
                            <span> المكتب </span>
                            <select wire:model='office_id' class="mt-1.5 " x-init="$el._x_tom = new Tom($el, { sortField: { field: 'text', direction: 'asc' } })">
                                <option value=""> . اختر المكتب </option>

                                @forelse ($office as $of)
                                    <option value="{{ $of->id }}">.... . {{ $of->name }}</option>
                                @empty
                                    <option value=""> لا توجد اي مكاتب</option>
                                @endforelse
                            </select>
                        </label>


                        @error('office_id')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror
                        <label class="block" >
                            <span> الحي </span>
                            <select wire:model='hood_id' class="mt-1.5 " x-init="$el._x_tom = new Tom($el, { sortField: { field: 'text', direction: 'asc' } })">
                                <option value=""> . اختر الحي </option>

                                @forelse ($hood as $hoo)
                                    <option value="{{ $hoo->id }}">.... . {{ $hoo->name }}</option>
                                @empty
                                    <option value=""> لا توجد اي احياء</option>
                                @endforelse
                            </select>
                        </label>


                        @error('hood_id')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror

            <label class="block mt-3 mbt">
                <span>وحدات الجوار</span>
                <select x-init="$el._tom = new Tom($el,{
                plugins: ['remove_button'],
                create: true,
                onItemRemove: function (val) {
                $notification({text:`${val} حذف`})  }   })" wire:model.defer="hood_unit"
                    wire:loading.class="opacity-50" wire:target="selectedsubsec" class="mt-1.5 w-full  font-medium"
                    multiple placeholder=" اختر وحدات الجوار الخاصه بالمفتش ..." autocomplete="off">


                    @forelse ( $hood_units as $hu )
                    <option value="{{ $hu->id}}">{{ $hu->no }}</option>
                    @empty
                    <option >يرجى اختيار الحي اولاً</option>
                    @endforelse


                </select>
                @error('hood_unit')
                <span class="text-tiny+ text-error">{{ $message }}</span>
                @enderror
            </label>

                    </div>

                    <!-- Modal footer -->
                    <div class="items-center p-4 border-gray-200 rounded-b dark:border-gray-700">
                        <button type="button" x-on:click="show = false"
                            class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            الغاء
                        </button>
                        <button type="button" wire:click.prevent='save'
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
            {{-- @slot('footer')

            @endslot --}}
        </x-modaladd>
    </div>

    <x-modaldel wire:ignore.self name="del-worker-modal">
        @slot('delbody')
            <div class="mt-4">
                <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                    تأكيد الحذف
                </h2>
                <p class="mt-2">
                    هل انت متأكد من انك تريد حذف هذه البيانات
                </p>
                <button wire:click="deleteWorkerData"
                    class="mt-6 font-medium text-white btn bg-success hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                    نعم انا متأكد
                </button>
                <button wire:click='cancel'
                    class="font-medium btn bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                    الغاء
                </button>
            </div>
        @endslot
    </x-modaldel>







</div>
