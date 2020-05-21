$('.mydatatable').DataTable();

$(document).ready(function() {
    $('.toast').toast({ delay: 5000 });
    $('.toast').toast('show');

});

$(document).ready(function() {
    $(document).on('click', '.Open_modifierEnseignant', function() {
        var code = $(this).attr("id");
        $.ajax({
            url: "fetching_teachers_for_editing.php",
            method: 'GET',
            data: {
                code: code
            },
            contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                $('#le_nom_modifier').val(data.nom_enseignant);
                $('#le_prenom_modifier').val(data.prenom_enseignant);
                $('#tel_modifier').val(data.telephone_enseignant);
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

// $(document).ready(function() {
//     $(document).on('click', '#afficheRespo', function() {
//         $.ajax({
//             url: "../Responsables/affiche_responsables.php",
//             dataType: "text",
//             success: function(data) {
//                 $('.enseignant').html(data);
//                 $('#afficheRespo').html("Afficher tous les enseignants");
//                 $('#afficheRespo').attr('href', "./");
//                 $('.titleH').html("Responsables");
//                 $('.aff').html('<li class="breadcrumb-item"><a href="../">Dashboard</a></li><li class="breadcrumb-item"><a href="./">Enseignants</a></li><li class="breadcrumb-item active" aria-current="page">Responsables</li>');
//             }
//         });
//     });
// });