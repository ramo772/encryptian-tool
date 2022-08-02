@props(["method"=>"" ,"action"=>"","formid"=>""])

<form class="richform" id="{{$formid}}" method="{{$method=='get'?'get':'post'}}" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($method=='delete')@method('delete')@endif
    @if($method=='put')@method('put')@endif

    {{$slot}}
</form>
