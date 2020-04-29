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
                url: "Absences/afficheTableauAbsencesParFiliere.php",
                method: "GET",
                data: {
                    id_filiere: id_filiere
                },
                dataType: "text",
                success: function(data) {
                    $('.absences').html(data);
                }
            });
        }
    });
}

$('.mydatatable').DataTable();

$(document).ready(function() {
    $('#filiere').change(function() {
        var id_filiere = $(this).val();
        $.ajax({
            url: "Absences/afficheTableauAbsencesParFiliere.php",
            method: "GET",
            data: {
                id_filiere: id_filiere
            },
            dataType: "text",
            success: function(data) {
                $('.absences').html(data);
            }
        });
    });
});
$(document).ready(function() {
    $(document).on('click', '.open_modifierAbsences', function() {
        var abs_id = $(this).attr("id");
        console.log(abs_id);
        $('#abs_Id').val(abs_id);
        $.ajax({
            url: "Absences/fetching_absences_for_editing.php",
            method: 'GET',
            data: {
                abs_id: abs_id,
            },
            contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                $('#le_nom_modifier').val(data.nom);
                $('#le_prenom_modifier').val(data.prenom);
                $('#nbHeurs_modifier').val(data.h_absence);
                $('#date_modifier').val(data.date_absence);
                $('#modul').val(data.id_module);
                $('#modifierAbsences').modal('show');
                console.log(data.module);
            },
            error: function() {
                alert('failure');
            }
        });

    });
});