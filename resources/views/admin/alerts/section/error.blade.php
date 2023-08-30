@if (session('alert-danger'))
<div class="alert alert-danger d-flex align-items-center" role="alert">
    <span class="alert-icon text-danger me-2">
        <i class="ti ti-check ti-xs"></i>
      </span>
    <span class="alert-icon text-danger me-2">
    <i class="ti ti-check ti-xs"></i>
    </span>
    {{ session('alert-danger') }}
</div>
@endif

