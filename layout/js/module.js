//9raaa l comment f ligne 37

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
if (id = getParam("Filiere")) {
    $("#filiere").val(id);
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
                }
            });
        }
    });
}

// rahe hna bdalte 7awle tfhame ache darte ou 9ado f hade l fonction li lfo9 
// dae l blane dyal fache nrja3 nb9a f nafse filiere ou nafse semester
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
                $('#Heures2').val(data.horaire);
                $('#Enseignant2').val(data.id_enseignant);
                $('#semesterBl').val(data.semester);
                $('#modifierUnModule').modal('show');
            },
            error: function() {
                alert('failure');
            }
        });

    });
});