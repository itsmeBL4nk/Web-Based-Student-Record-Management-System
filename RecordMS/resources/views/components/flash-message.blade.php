@if(Session::has('message'))
    <div x-data="{show: true}" x-init="setTimeout(()=> show = false, 3000)"
        x-show="show"  class="alert alert-success">
        {{Session::get('message')}}
    </div>
@endif


@if (session()->has('error'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" 
                x-show="show" class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper me-2"></i>
                {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif

{{-- @if ($errors->any())
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" 
                x-show="show" class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper me-2"></i>
                Excel cannot import
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif
@foreach ($errors->all() as $error)
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" 
    x-show="show" class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="mdi mdi-block-helper me-2"></i>
    {{$error}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
@endforeach --}}

