 @props([
    'title' => '',
    'description' => ''
 ])


 <div class="flex min-h-[calc(100dvh-4rem)] items-center justify-center px-4 bg-background">
     <div class="w-full max-w-md">
         <div class="text-center mb-10">
             <h1 class="text-3xl font-bold tracking-tight text-foreground">{{$title}}</h1>
             <p class="text-muted-foreground mt-2">{{$description}}</p>
         </div>

         {{ $slot }}
     </div>
 </div>
