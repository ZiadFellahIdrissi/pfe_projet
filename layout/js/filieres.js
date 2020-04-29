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
            url: "Filiere/fetching_students.php",
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
        var id_filier_modifier = $(this).attr("id");
        var nom_filier = $(this).data("id");
        $('#Modifier_inp').val(id_filier_modifier);
        $('#Nom_modifier').val(nom_filier);
        $('#modifierModal').modal('show');
    });
});