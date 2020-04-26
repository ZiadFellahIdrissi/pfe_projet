<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../layout/css/datatables.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="../layout/css/dashboard.css" rel="stylesheet">
    <title>test5</title>
</head>

<style>
    .modal-header {
        background-color: #dcdde1;
    }
</style>


<body>
     <?php include 'header.php' ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Absences</h1>
<!--                     <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">hiiii</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">hiiii</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            for now
                        </button>
                    </div> -->
                </div>

                <div class="container mt-3 mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Absences</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Consulter Absences</li>
                        </ol>
                    </nav>
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-md-6">
                                <select name="groupe" id="groupe" class="form-control">
                                    <option value=''>Choise un groupe</option>
                                    <?php
                                    $sql = "SELECT id_groupe,groupe_nom FROM groupe";
                                    $resultat = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                    ?>
                                        <option value='<?php echo $row["id_groupe"] ?>'><?php echo $row["groupe_nom"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <a href="consulte_abssence.php"><button type="button" class="btn btn-primary">Affiche tout</button></a>
                            </div>
                        </div>

                        <div class="modal-body consulte_abssence">
                            <?php include 'Abssence/afficheTableauAbssence.php' ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script type="text/javascript" src="../layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../layout/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../layout/js/bootstrap.min.js"></script>
    <script>
        $('.mydatatable').DataTable();
    </script>
    <script>
        $(document).ready(function() {
            $('#groupe').change(function() {
                var id_groupe = $(this).val();
                $.ajax({
                    url: "abssence/afficheTableauAbssenceParGroupe.php",
                    method: "GET",
                    data: {
                        id_groupe: id_groupe
                    },
                    dataType: "text",
                    success: function(data) {
                        $('.consulte_abssence').html(data);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.open_modifierabssence', function() {
                var groupeId = $(this).attr("id");
                var moduleId = $(this).data('id');
                var abss_id = $(this).data('info');
                $('#abss_Id').val(abss_id);
                $.ajax({
                    url: "abssence/fetching_abssence_for_editing.php",
                    method: 'GET',
                    data: {
                        groupeId: groupeId,
                        moduleId: moduleId
                    },
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(data) {

                        $('#le_nom_modifier').val(data.nom);
                        $('#le_prenom_modifier').val(data.prenom);
                        $('#nbHeurs_modifier').val(data.h_abssance);
                        $('#date_modifier').val(data.date_abssence);
                        $('#modul').val(data.module);
                        $('#modifierabssence').modal('show');
                        console.log(data.module);
                    },
                    error: function() {
                        alert('failure');
                    }
                });

            });
        });
    </script>


</body>

</html>