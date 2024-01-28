<div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
    <div class="col-span-12 lg:col-span-4">
        <div class="card p-4 sm:p-5">
            <div class="flex items-center space-x-4 space-x-reverse">
                <div class="avatar h-14 w-14">
                    <img class="rounded-full" src="{{ asset($admin->admin_img) }}" alt="avatar" />
                </div>
                <div>
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                        {{ $admin->fullname }}
                    </h3>
                    <p class="text-xs+"> {{ $admin->username }}@</p>
                </div>
            </div>
            <ul class="mt-6 space-y-1.5 font-inter font-medium">
                <li>
                    <a class="group flex space-x-2 space-x-reverse rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>المعلومات الشخصية</span>
                    </a>
                </li>
                <li>
                    <a class="group flex space-x-2 space-x-reverse rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>

                        <span>Notification</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center space-x-2 space-x-reverse rounded-lg bg-primary px-4 py-2.5 tracking-wide text-white outline-none transition-all dark:bg-accent"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span>Security</span>
                    </a>
                </li>
                <li>
                    <a class="group flex space-x-2 space-x-reverse rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        <span>Apps</span>
                    </a>
                </li>
                <li>
                    <a class="group flex space-x-2 space-x-reverse rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span> Privacy & data </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-span-12 lg:col-span-8">
        <div class="card">
            <div
                class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
                <h2 class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100">
                    تغيير كلمة المرور
                </h2>
                <div class="flex justify-center space-x-2 space-x-reverse">
                    <button
                        class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                        الغاء
                    </button>
                    <button wire:click='updatePassword'
                        class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        حفظ
                    </button>
                </div>
            </div>
            <div class="p-4 sm:p-5">

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <label class="block">
                        <span> كلمة المرور القديمة </span>
                        <span class="relative mt-1.5 flex">
                            <input wire:model='old_password'
                                class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="ادخل كلمة المرور القديمة " type="text" />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <i class="fa-regular fa-user text-base"></i>
                            </span>
                        </span>
                        @error('old_password')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>


                    <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <label class="block">
                        <span> كلمة المرور الجديدة </span>
                        <span class="relative mt-1.5 flex">
                            <input wire:model='new'
                                class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="ادخل كلمة المرور الجديدة" type="text" />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <i class="fa-regular fa-user text-base"></i>
                            </span>
                        </span>
                        @error('new')
                            <span class="text-tiny+ text-error">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>


                    <label class="block">
                        <span> تاكيد كلمة المرور </span>
                        <span class="relative mt-1.5 flex">
                            <input wire:model='new_conf'
                                class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pr-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="اعد كتابة كلمة المرور" type="text" />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <i class="fa fa-phone"></i>
                            </span>
                        </span>
                        @error('new_conf')
                        <span class="text-tiny+ text-error">
                            {{ $message }}
                        </span>
                    @enderror
                    </label>

                </div>
                <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>

            </div>
        </div>
    </div>
</div>
