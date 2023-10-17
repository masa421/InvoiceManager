@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" style="display: block;
        z-index: 9999;
        background-color: red;
        padding: 16px 20px;">
         <p>
            {{session('message')}}
         </p>

    </div>
@endif