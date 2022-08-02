@props(["title"=>"", 'right'=>false,'color'=>"none",'button'=>null,"route"=>""])


@if(!$button)
  <a href="{{$route}}" {{ $attributes->merge([ 'class' => " btn   px-3 me-2 me-md-3"]) }} >
    <x-icon-add >
    </x-icon-add> &nbsp;
    <span class="ps-1">  &nbsp; {{$slot}}</span>
  </a>
@else
<button {{ $attributes->merge([ 'class' => " btn   px-3 me-4 me-md-3"]) }} >
  <x-icon-add >
  </x-icon-add> &nbsp;
    <span class="ps-1"> &nbsp;{{$slot}}</span>
  </button>

@endif
