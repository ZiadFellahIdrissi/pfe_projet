$(document).ready(function() {
    $('#filiere').change(function() {
        var id_filiere = $(this).val();
        if (id_filiere) {
            $.ajax({
                url: "afficheEtudiantsParFiliere.php",
                method: "GET",
                data: {
                    id_filiere: id_filiere
                },
                dataType: "text",
                success: function(data) {
                    $('.etudiants').html(data);
                }
            });
        }
    });

    $('#filiere').change(affiche);
    function affiche() {
        if($('#filiere').val()!="")
            $(".etudiants").show();
        else
            $('.etudiants').hide();
    }

    $(document).on('click', '.openModalNotes', function() {
        var cin = $(this).attr("id");
        $('#RelvetDesNotes').modal('show');
        $.ajax({
            url: "fetching_relevetDesNotes.php",
            method: 'GET',
            data: {
                cin: cin,
            },
            dataType: "text",
            beforeSend: function() {
                $("#spinner").show();
            },
            complete: function() {
                $("#spinner").hide();
            },
            success: function(data) {
                $('.notes').html(data);
                // $("#studentPicture").attr("src", "../../../img/profiles/5ed8cabb3a4512.05077058.jpg");
                // console.log(data.k);
            },
            error: function() {
                alert('failure');
            }
        });
    });
});