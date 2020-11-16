<!-- for success or failure message -->
{{--<div class='col-md-6'>--}}
    @if (session()->has('success'))
        <p class="text-success">{{ session('success') , session()->pull('success')}}</p>
    @else
        <p class="text-danger">{{ session('error') , session()->pull('error')}}</p>
    @endif
{{--</div>--}}
