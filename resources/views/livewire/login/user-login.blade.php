
<div class="flex w-full max-w-sm grow flex-col justify-center p-5">
    <form wire:submit.prevent="reloadPage">
    <div class="text-center">
        <img class="mx-auto h-16 w-16 lg:hidden" src="{{ asset('login/images/app-logo.svg') }}" alt="logo" />
        <div class="mt-4">
            <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                Welcome Back
            </h2>
            <p class="text-slate-400 dark:text-navy-300">
                Please sign in to continue
            </p>
        </div>
    </div>
    <div class="mt-16">
        <label class="relative flex">
            <input
                wire:model='username'
                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pr-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                placeholder="Username" type="text" />
            <span
                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </span>
        </label>
        @error('username')
            <div class="alert alert-danger" style="color: red" role="alert">
                {{ $message }}
            </div>
        @enderror
        <label class="relative mt-4 flex">
            <input
                wire:model='password'
                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pr-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                placeholder="Password" type="password" />
            <span
                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </span>
        </label>
        @error('password')
            <div class="alert alert-danger" style="color: red" role="alert">
                {{ $message }}
            </div>
        @enderror

        <button
        
            class="btn mt-10 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
            Sign In
        </button>


    </div>
</form>
</div>

