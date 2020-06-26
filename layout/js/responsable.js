$('.mydatatable').DataTable();

$(document).ready(function() {
    $(document).on('click', '.openModalInformation', function() {
        $('.responsableInfo').modal('show');
        var cin = $(this).attr("id");
        $.ajax({
            url: "info.php",
            method: 'GET',
            data: {
                cin: cin
            },
            dataType: 'text',
            beforeSend: function() {
                $("#spinner").show();
            },
            complete: function() {
                $("#spinner").hide();
            },
            success: function(data) {
                $('.modalInfo').html(data);
            },
            error: function() {
                alert('failure');
            }
        });
    });
});