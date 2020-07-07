$(document).ready(function() {
    $('.toast').toast({
        delay: 5000
    });
    $('.toast').toast('show');
    
    $(document).on('click', '.openModalInformation', function() {
        $('.responsableInfo').modal('show');
        var cin = $(this).attr("id");
        $.ajax({
            url: "info.php",
            method: 'GET',
            data: {
                cin: cin
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

    $(document).on('click', '.Open_modifierResponsable', function() {
        var code = $(this).attr("id");
        $.ajax({
            url: "../Enseignants/fetching_teachers.php",
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
                $('#cin_modifier').val(data.id);
                $('#id_enseignant').val(data.id);
                $('#som_modifier').val(data.som);
                $('#dateN_modifier').val(data.date_naissance);
                $('#modifierUnResponsable').modal('show');
            },
            error: function() {
                alert('failure');
            }
        });
    });
});

$('.mydatatable').DataTable();