
$(document).ready(function() {
    $('.toast').toast({ delay: 5000 });
    $('.toast').toast('show');

});

$(document).ready(function() {
    $(document).on('click', '.Open_modifierEnseignant', function() {
        var code = $(this).attr("id");
        $.ajax({
            url: "fetching_teachers.php",
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
                $('#modifierUnEnseignant').modal('show');
            },
            error: function() {
                alert('failure');
            }
        });

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

$(document).ready(function() {
    $(document).on('click', '.openModalInformation', function() {
        $('.teacherInfo').modal('show');
        var cin = $(this).attr("id");
        console.log(cin);
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
});

$('.mydatatable').DataTable();