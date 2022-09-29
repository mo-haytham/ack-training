@if (session()->has('custom_error'))
    <div class="alert alert-danger text-center">{{ session('custom_error') }}</div>
@endif

@if (session()->has('custom_success'))
    <div class="alert alert-success text-center">{{ session('custom_success') }}</div>
@endif
