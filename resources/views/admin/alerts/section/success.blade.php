@if (session('alert-success'))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <span class="alert-icon text-success me-2">
        <i class="ti ti-check ti-xs"></i>
      </span>
    <span class="alert-icon text-success me-2">
    <i class="ti ti-check ti-xs"></i>
    </span>
    {{ session('alert-success') }}
</div>
@endif

