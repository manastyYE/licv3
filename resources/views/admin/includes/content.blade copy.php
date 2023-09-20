<div class="flex items-center space-x-4 space-x-reverse py-5 lg:py-6">
   <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
      @yield('contentheader')
   </h2>
   <div class="hidden h-full py-1 sm:flex">
      <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
   </div>
   <ul class="hidden flex-wrap items-center space-x-2 space-x-reverse sm:flex">
      <li class="flex items-center space-x-2 space-x-reverse">
         <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
            href="#">@yield('contentheaderlink')</a>
         <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
         </svg>
      </li>
      <li>@yield('contentheaderactive')</li>
   </ul>
</div>


@yield('content')

</div>