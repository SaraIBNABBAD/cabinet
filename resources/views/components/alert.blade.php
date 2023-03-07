@props(['type'=>'success','message'])

<div
 {{$attributes->merge(['class'=>'w-50 justify-content-center text-center alert alert-'.$type])}}><i class="fa-solid fa-triangle-exclamation"></i>
    {{$message}}
    
</div>