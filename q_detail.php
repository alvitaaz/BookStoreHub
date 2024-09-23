<script type="text/javascript">
$(document).ready(() => {
    $("#detail").on('click', function(e) {
        const m = $(this).attr("id");
        $.ajax({
            url: "detail.php",
            type: "GET",
            data: { id: m },
            success: (ajaxData) => {
                $("#Modaldet").html(ajaxData);
                $("#Modaldet").modal('show', { backdrop: 'true' });
            },
            error: (xhr, status, error) => {
                console.error(error);
            }
        });
    });
});
</script>
