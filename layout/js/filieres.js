$('.mydatatable').DataTable();
$(document).ready(function() {
    $('.toast').toast({ delay: 5000 });
    $('.toast').toast('show');

});
$(document).ready(function() {
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
                $('#affiche_etudiant').html(data);
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
});
