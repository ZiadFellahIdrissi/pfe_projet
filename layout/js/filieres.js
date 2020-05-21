$('.mydatatable').DataTable();
$(document).ready(function() {
    $('.toast').toast({ delay: 5000 });
    $('.toast').toast('show');

});
$(document).ready(function() {
    $(".open-confirmation").click(function() {
        var filier_id = $(this).data('id');
        $('#confirmation').val(filier_id);
        $('#confermationAle').modal('show');
        // pour affichie les etudiant qui va supprimie si il suprimie un filiere
        $.ajax({
            url: "fetching_students.php",
            method: "POST",
            data: {
                filier_id: filier_id
            },
            dataType: "text",
            success: function(data) {
                $('#affiche_etudiant').html(data);
            }
        });
    });

    $(".open_modifierModal").click(function() {
        var code = $(this).attr("id");
        $.ajax({
            url: "fetching_filieres_for_editing.php",
            method: 'GET',
            data: {
                code: code
            },
            contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                $('#Modifier_inp').val(data.id_filiere);
                $('#Responsable_modifier').val(data.responsable_id);
                $('#Nom_modifier').val(data.nom_filiere);
                $('#modifierModal').modal('show');
            },
            error: function() {
                alert('failure');
            }
        });
        
    });
});
