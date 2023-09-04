<script>
    $(document).ready(function() {
        $('.deleteButton').on('click', function() {
            Swal.fire({
                title: 'آیا از حذف اطمینان دارید؟',
                text: 'شما می توانید درخواست خود را لغو نمایید.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله انجام شود.',
                cancelButtonText: 'خیر درخواست لغو شود.',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ms-1'
                },
                buttonsStyling: false
            })
            .then(({ value }) => {
                if (!value) return;

                $(this).closest('form').submit();
            });
        });
    });
</script>
