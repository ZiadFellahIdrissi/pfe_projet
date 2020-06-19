$('.mydatatable').DataTable();
$(document).ready(function() {
    $('.toast').toast({
        delay: 5000
    });
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
                url: "afficheEtudiantsParFiliere.php",
                method: "GET",
                data: {
                    id_filiere: id_filiere
                },
                dataType: "text",
                success: function(data) {
                    $('.etudiants').html(data);
                }
            });
        }
    });
}

$('.mydatatable').DataTable();

$(document).ready(function() {
    $('#filiere').change(function() {
        var id_filiere = $(this).val();

        if (id_filiere) {
            $.ajax({
                url: "afficheEtudiantsParFiliere.php",
                method: "GET",
                data: {
                    id_filiere: id_filiere
                },
                dataType: "text",
                success: function(data) {
                    $('.etudiants').html(data);
                }
            });
        }
    });
});

$(document).ready(function() {
    $(document).on('click', '.Open_modifierUnEtudiant', function() {
        var cin = $(this).attr("id");
        $('#oldCin').val(cin);
        $.ajax({
            url: "fetching_students_for_editing.php",
            method: 'GET',
            data: {
                cin: cin
            },
            contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                $('#le_nom_modifier').val(data.nom);
                $('#le_prenom_modifier').val(data.prenom);
                $('#cne_modifier').val(data.cne);
                $('#cin_modifier').val(data.cin);
                $('#date_modifier').val(data.date_naissance);
                $('#tel_modifier').val(data.telephone);
                $('#email_modifier').val(data.email);
                $('#fil').val(data.id_filiere);
                $('#modifierUnEtudiant').modal('show');
            },
            error: function() {
                alert('failure');
            }
        });

    });
});