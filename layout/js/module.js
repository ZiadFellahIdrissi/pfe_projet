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
                url: "../Modules/afficheModulesParFiliere.php",
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
                url: "../Modules/afficheModulesParFiliere.php",
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
$(document).ready(function() {
    $(document).on('click', '.Open_modifierUnModule', function() {
        var code = $(this).attr("id");
        $.ajax({
            url: "../Modules/fetch_module_infos.php",
            method: 'GET',
            data: {
                code: code
            },
            contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                $('#id_module2').val(data.id_module);
                $('#le_nom2').val(data.intitule);
                $('#Heures2').val(data.horaire);
                $('#Enseignant2').val(data.id_enseignant);
                $('#modifierUnModule').modal('show');
            },
            error: function() {
                alert('failure');
            }
        });

    });
});