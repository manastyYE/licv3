<div>
    <button
        wire:click='export'
        class="font-medium border btn border-slate-300 text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
        تصدير كملف اكسل
    </button>
    <div>
        <div x-data="pages.tables.initGridTableExapmle">
            <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                <div class="gridjs-head">
                    <div class="gridjs-search"><input type="search" wire:model='search' placeholder="ابحث من هنا ... "
                            aria-label="ابحث من هنا... " class="gridjs-input gridjs-search-input">
                            <label class="block">
                                <span> فلترة حسب المفتش</span>
                                <select wire:model='street_id' class="mt-1.5 w-full " x-init="$el._x_tom = new Tom($el, { sortField: { field: 'text', direction: 'asc' } })">>
                                    <option value="*">اختر </option>
                                    @forelse ($workers as $s)
                                    <option value="{{ $s->id }}">{{ $s->fullname }} </option>
                                    @empty
                                        <option value="">لا توجد اي بيانات </option>
                                    @endforelse
                                </select>
                            </label>
                        </div>
                </div>
                <div class="gridjs-wrapper" style="height: auto;">
                    <table role="grid" class="gridjs-table" style="height: auto;">
                        <thead class="gridjs-thead">
                            <tr class="gridjs-tr">
                                <th data-column-id="id" class="gridjs-th gridjs-th-sort" tabindex="0">
                                    <div class="gridjs-th-content">#</div>
                                </th>
                                <th data-column-id="name" class="gridjs-th gridjs-th-sort" tabindex="0">
                                    <div class="gridjs-th-content">
                                        اسم المنشأة
                                    </div>
                                </th>
                                <th data-column-id="name" class="gridjs-th gridjs-th-sort" tabindex="0">
                                    <div class="gridjs-th-content">
                                        اسم المالك
                                    </div>
                                </th>
                                <th data-column-id="name" class="gridjs-th gridjs-th-sort" tabindex="0">
                                    <div class="gridjs-th-content">
                                        رقم المالك
                                    </div>
                                </th>
                                <th data-column-id="name" class="gridjs-th gridjs-th-sort" tabindex="0">
                                    <div class="gridjs-th-content">
                                        نوع النشاط التجاري
                                    </div>
                                </th>



                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content">الشارع</div>
                                </th>

                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content">المسخدم</div>
                                </th>

                                <th data-column-id="actions" class="gridjs-th">
                                    <div class="gridjs-th-content">الحالة</div>
                                </th>

                            </tr>
                        </thead>
                        <tbody class="gridjs-tbody">
                            <?php $i = 0; ?>
                            @if ($orgs->count() > 0)
                            @foreach ($orgs as $p)
                            <?php $i++; ?>


                                <tr class="gridjs-tr">
                                    <td class="gridjs-td"><span><span class="mx-2">{{ $i }}</span></span></td>
                                    <td class="gridjs-td">
                                        <a href="/admin/vir_orgs/show/{{ $p->id }}">
                                            {{ $p->org_name }}
                                        </a>
                                    </td>
                                    <td class="gridjs-td">{{ $p->owner_name }}</td>
                                    <td class="gridjs-td">{{ $p->owner_phone }}</td>
                                    <td class="gridjs-td">{{ $p->org_type->name }}</td>
                                    <td class="gridjs-td">{{ $p->street->name }}</td>
                                    <td class="gridjs-td">{{ $p->user->fullname }}</td>
                                    @if ($p->is_moved)
                                    <td class="gridjs-td">تم النقل</td>
                                    @else
                                    <td class="gridjs-td">لم تنقل </td>
                                    @endif


                                </tr>



                            @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>
                <div class="gridjs-footer">
                    <div class="gridjs-pagination">
                        <div role="status" aria-live="polite" class="gridjs-summary" title="Page 1 of 2">
                            {{ $orgs->links() }}
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
</div>
