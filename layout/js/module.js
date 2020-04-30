$('.mydatatable').DataTable();
$(document).ready(function() {
    $('.toast').toast({ delay: 5000 });
    $('.toast').toast('show');

});

function getParam(id) {
    string = window.location.href;
    var url = new URL(string);
    return url.searchParams.get("idUrl" + id);
}
if (id = getParam("Filiere")) {
    $("#filiere").val(id);
    $(document).ready(function() {
        var id_filiere = $("#filiere").val();
        if (id_filiere) {
            $.ajax({
                url: "Modules/afficheModulesParFiliere.php",
                method: "GET",
                data: {
                    id_filiere: id_filiere
                },
                dataType: "text",
                success: function(data) {
                    $('.modules').html(data);
                }
            });
        }
    });
}

$(document).ready(function() {
    $('#filiere').change(function() {
        var id_filiere = $(this).val();
        if (id_filiere) {
            $.ajax({
                url: "Modules/afficheModulesParFiliere.php",
                method: "GET",
                data: {
                    id_filiere: id_filiere
                },
                dataType: "text",
                success: function(data) {
                    $('.modules').html(data);
                }
            });
        }
    });
});