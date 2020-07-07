$(document).ready(function() {
    $("#spinner").hide();
    $("#spinner2").hide();
    $('#module').change(fetchNotes);

    function fetchNotes() {
        $('.notes').hide();
        var module = $("#module").val();
        $.ajax({
            url: '../../../src/prof/Notes/fetchControleType.php',
            method: "GET",
            data: {
                module: module
            },
            dataType: "text",
            beforeSend: function() {
                $("#spinner2").show();
            },
            complete: function() {
                $("#spinner2").hide();
            },
            success: function(data) {
                $('#id_controle').html(data);
            }
        });
    }

    $('#id_controle').change(afficheNotes);

    function afficheNotes() {
        var module = $("#module").val();
        var id_controle = $("#id_controle").val();
        $.ajax({
            url: '../../../src/prof/Notes/fetch_notes.php',
            method: "GET",
            data: {
                module: module,
                id_controle: id_controle
            },
            dataType: "text",
            beforeSend: function() {
                $("#spinner").show();
                $(".notes").hide();
            },
            complete: function() {
                $("#spinner").hide();
                $(".notes").show();
            },
            success: function(data) {
                $('.notes').html(data);
                $('.notes').show();
            }
        });
    }

    $('#id_controle').hide();
    $('#module').change(affiche);

    function affiche() {
        if (!isNaN($('#module').val()))
            $('#id_controle').show();
    }
});