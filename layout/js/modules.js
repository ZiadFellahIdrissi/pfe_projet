$('.mydatatable').DataTable();

$(document).ready(function() {
    $('.toast').toast({
        delay: 5000
    });
    $('.toast').toast('show');

});

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
    $('.modules').hide();
    $('#semester').hide();
    $('#filiere').change(affiche);
    function affiche() {
        if($('#filiere').val()!=""){
            $('#semester').show();
            $(".modules").show();
        }
        else{
            $('#semester').hide();
            $('.modules').hide();
        }
    }
});


var id_f = $("#filiere").val();

$(document).ready(function() {
     $('#filiere').change(affiche);
      function affiche() {
        if(id_f != $('#filiere').val()){
            $('#semester').prop('selectedIndex',0);
        }
      }
});

$(document).ready(function() {
    $('#filiere').change(affiche);
    $("#semester").change(affiche);
    function affiche() {
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
});

$(document).ready(function() {
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
});