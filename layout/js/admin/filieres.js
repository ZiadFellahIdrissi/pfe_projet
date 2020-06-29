$(document).ready(function() {
    $('.toast').toast({
        delay: 5000
    });
    $('.toast').toast('show');

    $(".open-confirmation").click(function() {
        var id_filiere = $(this).data('id');
        $('#confirmation').val(id_filiere);
        $('#confermationAle').modal('show');
        // l'affichage des etudiants qui appartient à la filiere qu'on veut supprimer
        $.ajax({
            url: "fetching_students.php",
            method: "POST",
            data: {
                id_filiere: id_filiere
            },
            dataType: "text",
            success: function(data) {
                $('#affiche_etudiants').html(data);
            }
        });
        // l'affichage des modules qui appartient à la filiere qu'on veut supprimer
        $.ajax({
            url: "fetching_modules.php",
            method: "POST",
            data: {
                id_filiere: id_filiere
            },
            dataType: "text",
            success: function(data) {
                $('#affiche_modules').html(data);
            }
        });
    });

    $(".open_modifierModal").click(function() {
        var id_filiere = $(this).attr("id");
        $.ajax({
            url: "fetching_filieres_for_editing.php",
            method: 'GET',
            data: {
                id_filiere: id_filiere
            },
            contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                $('#Modifier_inp').val(data.id_filiere);
                $('#Responsable_modifier').val(data.id_responsable);
                $('#oldResp').val(data.id_responsable);
                $('#prix_modifier').val(data.prix_formation);
                $('#Nom_modifier').val(data.nom_filiere);
                $('#modifierModal').modal('show');
            },
            error: function() {
                alert('failure');
            }
        });
    });

    $(".open_confirmationAct").click(function() {
        var id_filiere = $(this).attr("id");
        $.ajax({
            url: "fetching_filieres_for_editing.php",
            method: 'GET',
            data: {
                id_filiere: id_filiere
            },
            contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                $('#fil_act').val(data.nom_filiere);
                $('#tarif').val(data.prix_formation);
                $('#filiere').val(data.id_filiere);
                $('#actModal').modal('show');
            },
            error: function() {
                alert('failure');
            }
        });
    });

    $(document).on('click', '.openModalInformation', function() {
        $('.filiereInfo').modal('show');
        var id = $(this).attr("id");
        $.ajax({
            url: "info.php",
            method: 'GET',
            data: {
                id: id
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