<script type="module">
    $('.destroyItem').click(function(e) {
        const button = $(this);
        const deleteUrl = button.data('bsRoute');
        const object = button.data('bsObject');
        $("#form_delete").attr('action', deleteUrl);

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $("#form_delete").submit();
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            }
        });
    });
</script>
