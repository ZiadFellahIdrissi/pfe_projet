function getParam(id) {
    string = window.location.href;
    var url = new URL(string);
    return url.searchParams.get("idUrl" + id);
}

var id = getParam("Filiere");
var id2 = getParam("Sem");

if (id && id2) {
    $("#filiere").val(id);
    $("#semester").val(id2);
    $(document).ready(function() {
        var id_filiere = $("#filiere").val();
        var semester = $("#semester").val();
        if (id_filiere) {
            $.ajax({
                url: "../Modules/afficheModulesParFiliere.php",
                method: "GET",
                data: {
                    id_filiere: id_filiere,
                    semester: semester
                },
                dataType: "text",
                success: function(data) {
                    $('.modules').html(data);
                    $('#semester').show();
                    $(".modules").show();
                }
            });
        }
    });
}

$(document).ready(function() {
    $('.toast').toast({
        delay: 5000
    });
    $('.toast').toast('show');

    $('.modules').hide();
    $('#semester').hide();
    $('#filiere').change(affiche);

    function affiche() {
        if ($('#filiere').val() != "") {
            $('#semester').show();
            $(".modules").show();
        } else {
            $('#semester').hide();
            $('.modules').hide();
        }
    }

    var id_f = $("#filiere").val();
    $('#filiere').change(affiche1);

    function affiche1() {
        if (id_f != $('#filiere').val()) {
            $('#semester').prop('selectedIndex', 0);
        }
    }

    $('#filiere').change(affiche2);
    $("#semester").change(affiche2);

    function affiche2() {
        var id_filiere = $("#filiere").val();
        var semester = $("#semester").val();
        if (id_filiere) {
            $.ajax({
                url: "../Modules/afficheModulesParFiliere.php",
                method: "GET",
                data: {
                    id_filiere: id_filiere,
                    semester: semester
                },
                dataType: "text",
                success: function(data) {
                    $('.modules').html(data);
                }
            });
        }
    }

    $(document).on('click', '.Open_modifierUnModule', function() {
        var code = $(this).attr("id");
        $.ajax({
            url: "../Modules/fetch_module_infos.php",
            method: 'GET',
            data: {
                code: code
            },
            contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                $('#id_module2').val(data.id_module);
                $('#le_nom2').val(data.intitule);
                $('#Heures2').val(data.heures_sem);
                $('#coeffC_modifier').val(data.coeff_controle);
                $('#coeffE_modifier').val(data.coeff_examen);
                $('#Enseignant2').val(data.id_enseignant);
                $('#semesterBl').val(data.id_semestre);
                $('#oldSem').val(data.id_semestre);
                $('#filiere_modifier').val(data.id_filiere);
                $('#modifierUnModule').modal('show');
            },
            error: function() {
                alert('failure');
            }
        });
    });

    $(document).on('click', '.openModalInformation', function() {
        $('.moduleInfo').modal('show');
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

    