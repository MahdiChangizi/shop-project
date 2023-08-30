@if (session('toast-success'))

<div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <i class="ti ti-bell ti-xs me-2 text-success"></i>
      <div class="me-auto fw-semibold">موفقیت آمیز</div>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">{{ session('toast-success') }}</div>
  </div>

@endif

