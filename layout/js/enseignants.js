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
                $('#le_nom_modifier').val(data.nom);
                $('#le_prenom_modifier').val(data.prenom);
                $('#tel_modifier').val(data.telephone);
                $('#email_modifier').val(data.email);
                $('#cin_modifier').val(data.id);
                $('#id_enseignant').val(data.id);
                $('#dateN_modifier').val(data.date_naissance);
                $('#modifierUnEnseignant').modal('show');
            },
            error: function() {
                alert('failure');
            }
        });

    });

    $(document).ready(function() {
        $(".open-confirmationR").click(function() {
            var filiere = $(this).attr('id');
            $('#fil').html(filiere);
            $('#confermationR').modal('show');
        });
    });

    $(document).ready(function() {
        $(".open-confirmationE").click(function() {
            var module = $(this).attr('id');
            $('#module').html(module);
            $('#confermationE').modal('show');
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