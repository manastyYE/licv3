<div>
    <button type="button"
        class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
        data-toggle="modal" data-target="#addStudentModal">اضافة نشاط تجاري </button>
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
                                    <div class="gridjs-th-content">نوع النشاط التجاري</div><button tabindex="-1"
                                        aria-label="Sort column ascending" title="Sort column ascending"
                                        class="gridjs-sort gridjs-sort-neutral"></button>
                                </th>
                               
                                <th data-column-id="email" class="gridjs-th gridjs-th-sort" tabindex="0">
                                    <div class="gridjs-th-content">رسوم النظافة</div><button tabindex="-1"
                                        aria-label="Sort column ascending" title="Sort column ascending"
                                        class="gridjs-sort gridjs-sort-neutral"></button>
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
                                <td data-column-id="id" class="gridjs-td"><span><span class="mx-2">{{ $i }}</span></span></td>
                                <td data-column-id="name" class="gridjs-td"><span><span
                                            class="text-slate-700 dark:text-navy-100 font-medium">{{ $p->name }}</span></span>
                                </td>
                                
                                <td data-column-id="email" class="gridjs-td">{{ $p->price }}</td>
                                <td data-column-id="actions" class="gridjs-td"><span>
                                        <div class="flex justify-center space-x-2">
                                            <button @click="editItem"
                                                class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button @click="deleteItem"
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
                            <b>1</b> to <b>10</b> of <b>15</b> results</div>
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



    <div wire:ignore.self
        class="modal fade fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
        role="dialog" id="addStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div
                class="modal-content flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                <div
                    class="modal-header flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">

                    <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                        اضافة لوحة
                    </h2>

                    <button type="button" class="" data-dismiss="modal" aria-label="Close"
                        class="close btn -ml-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class=" justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">

                    <form wire:submit.prevent="storeStudentData">
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







                        <hr>


                        <button type="button" data-dismiss="modal"
                            class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            الغاء
                        </button>
                        <button type="submit"
                            class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            تأكيد
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
<script>
    window.addEventListener('close-modal', event =>{
        $('#addStudentModal').modal('hide');
        $('#editStudentModal').modal('hide');
        $('#deleteStudentModal').modal('hide');
    });

    window.addEventListener('show-edit-student-modal', event =>{
        $('#editStudentModal').modal('show');
    });

    window.addEventListener('show-delete-confirmation-modal', event =>{
        $('#deleteStudentModal').modal('show');
    });

    window.addEventListener('show-view-student-modal', event =>{
        $('#viewStudentModal').modal('show');
    });
</script>
@endpush