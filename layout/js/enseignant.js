$('.mydatatable').DataTable();
$(document).ready(function() {
    $('.toast').toast({ delay: 5000 });
    $('.toast').toast('show');

});
$('.mydatatable').DataTable();
$(document).ready(function() {
    $(document).on('click', '.Open_modifierEnseignant', function() {
        var code = $(this).attr("id");
        $.ajax({
            url: "Enseignant/fetching_teachers_for_editing.php",
            method: 'GET',
            data: {
                code: code
            },
            contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                $('#le_nom_modifier').val(data.nom_enseignant);
                $('#le_prenom_modifier').val(data.prenom_enseignant);
                $('#date_modifier').val(data.date_naissance_enseignant);
                $('#email_modifier').val(data.email_enseignant);
                $('#id_enseignant').val(data.id_enseignant);
                $('#modifierUnEnseignant').modal('show');
            },
            error: function() {
                alert('failure');
            }
        });

    });

    $(document).ready(function() {
        $(".open-confirmation").click(function() {
            var filiere = $(this).attr('id');
            $('#fil').html(filiere);
            $('#confermationAle').modal('show');
        });
    });
});
