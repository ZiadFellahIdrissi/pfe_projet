$(document).ready(function() {
    var calendar = $('#calendar').fullCalendar({
        loading: function(bool) {
            $('#spinner0').show();
            $('#spinner1').show();
        },
        eventAfterAllRender: function(view) {
            $('#spinner0').hide();
            $('#spinner1').hide();
        },
        locale: 'fr-ch',
        editable: true,
        customButtons: {
            ajouteControle: {
                text: 'Ajoute un Controle',
                click: function() {
                    $("#addControle").modal('show');
                }
            }
        },
        header: {
            left: 'prev,next,today ajouteControle',
            center: 'title',
            right: 'month,agendaWeek,list'
        },
        theme: true,
        themeSystem: 'bootstrap4',
        events: '../../../src/prof/Controle/loadControles.php?id=<?php echo $id ?>',
        selectable: true,
        selectHelper: true,
        editable: true,

        select: function(start, end) {
            var dateControle = $.fullCalendar.formatDate(start, 'Y-MM-DD');
            var heur_debut = $.fullCalendar.formatDate(start, 'HH:mm');
            var heur_fin = $.fullCalendar.formatDate(end, 'HH:mm');

            // tester la date de controle
            let dateNow = GetFormattedDate();
            let d1 = new Date(dateControle);
            let d2 = new Date(dateNow);
            if (d1.getDate() <= d2.getDate()) {
                alert("Imposible d'ajouter un controle dans cette date ");
                return false;
            } else {
                $("#date_controle").val(dateControle);
                $("#heur_debut").val(heur_debut);
                $("#heur_fin").val(heur_fin);
                $("#addControle").modal('show');
            }
        },
        eventResize: function(e) {
            var dateControle = $.fullCalendar.formatDate(e.start, 'Y-MM-DD');
            var heur_debut = $.fullCalendar.formatDate(e.start, 'HH:mm');
            var heur_fin = $.fullCalendar.formatDate(e.end, 'HH:mm');
            var id_controle = e.id;
            //test de la durée du controle
            var d1 = new Date(dateControle + ' ' + heur_debut);
            var d2 = new Date(dateControle + ' ' + heur_fin);
            var diff = (d2.getHours() * 60 + d2.getMinutes() - d1.getHours() * 60 + d1.getMinutes()) / 60;
            console.log(diff);
            if (diff < 1) {
                alert("La durée du controle doit être égale à une heure au minimum!");
                calendar.fullCalendar("refetchEvents");
            } else {
                $.ajax({
                    url: 'modifierControles.php',
                    type: 'GET',
                    data: {
                        dateControle: dateControle,
                        heur_debut: heur_debut,
                        heur_fin: heur_fin,
                        id_controle: id_controle

                    },
                    success: function() {
                        alert("tmodifat");
                        calendar.fullCalendar("refetchEvents");
                    },
                    error: function() {
                        alert('failure');
                    }
                })
            }
        },
        eventDrop: function(e) {
            var dateControle = $.fullCalendar.formatDate(e.start, 'Y-MM-DD');
            var heur_debut = $.fullCalendar.formatDate(e.start, 'HH:mm');
            var heur_fin = $.fullCalendar.formatDate(e.end, 'HH:mm');
            var id_controle = e.id;

            //pour test la date de controle
            let dateNow = GetFormattedDate();
            let d1 = new Date(dateControle);
            let d2 = new Date(dateNow);
            if (d1.getDate() <= d2.getDate()) {
                alert("Imposible de modifier cette Controle");
                calendar.fullCalendar("refetchEvents");
            } else {
                $.ajax({
                    url: 'modifierControles.php',
                    type: 'GET',
                    data: {
                        dateControle: dateControle,
                        heur_debut: heur_debut,
                        heur_fin: heur_fin,
                        id_controle: id_controle

                    },
                    success: function() {
                        alert("tmodifat");
                        calendar.fullCalendar("refetchEvents");
                    },
                    error: function() {
                        alert('failure');
                    }

                });
            }
        },
        eventClick: function(event) {
            var dateControle = $.fullCalendar.formatDate(event.start, 'Y-MM-DD');
            var dateNow = GetFormattedDate();
            var d1 = new Date(dateControle);
            var d2 = new Date(dateNow);

            if (d1.getDate() <= d2.getDate()) {
                alert("Imposible de supprimier cette Controle");
                return false;
            } else {
                if (confirm("Vous êtes sure de supprimer cet examen !!")) {
                    var id = event.id;
                    $.ajax({
                        url: 'supprimerExamen.php',
                        type: "GET",
                        data: {
                            id_controle: id
                        },
                        success: function() {
                            //modal
                            calendar.fullCalendar("refetchEvents");
                        }
                    })
                }
            }
        }
    });

    function GetFormattedDate() {
        var todayTime = new Date();
        var month = todayTime.getMonth();
        var day = todayTime.getDate();
        var year = todayTime.getFullYear();
        return year + "-" + month + "-" + day;

    }
    $(document).on('click', '#ajouterControle', function() {
        var module = $("#module").val();
        var dateControle = $("#date_controle").val();
        var heur_debut = $("#heur_debut").val();
        var heur_fin = $("#heur_fin").val();

        // tester la date de controle
        let dateNow = GetFormattedDate();
        let d01 = new Date(dateControle);
        let d02 = new Date(dateNow);

        //test de la durée du controle
        var d1 = new Date(dateControle + ' ' + heur_debut);
        var d2 = new Date(dateControle + ' ' + heur_fin);
        var diff = (d2.getHours() * 60 + d2.getMinutes() - d1.getHours() * 60 + d1.getMinutes()) / 60;

        if (d01.getDate() <= d02.getDate()) {
            alert("impossible d'ajouter cette contrlr dans cetter date");
            return false;
        } else {
            if (diff < 1) {
                alert("La durée du controle doit être égale à une heure au minimum!");
            } else {
                $.ajax({
                    url: "ajoute_controle.php",
                    method: 'GET',
                    data: {
                        module: module,
                        dateControle: dateControle,
                        heur_debut: heur_debut,
                        heur_fin: heur_fin
                    },
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(data) {
                        if (data.error) {
                            alert(data.error);
                        } else {
                            calendar.fullCalendar("refetchEvents");
                            $("#addControle").modal('hide');
                        }
                    },
                    error: function() {
                        alert('failure');
                    }
                });
            }
        }
    });
});