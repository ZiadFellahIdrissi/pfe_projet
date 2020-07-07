<?php
    include_once '../../../core/init.php';
    $sql = "SELECT Demandes.id, Demandes.type, Demandes.date, Utilisateur.nom, Utilisateur.prenom
            FROM Demandes
            JOIN Utilisateur ON Demandes.id_etudiant = Utilisateur.id
            WHERE etat = -1";
    $db->query($sql, []);
?>
    <div class="table-responsive-sm">
        <table class="table table table-borderless table-hover mydatatable">
            <thead class="thead-dark">
                <tr>
                    <th>Etudiant</th>
                    <th>Type</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if($db->count()>0){
                foreach($db->results() as $row) {
            ?>
                    <tr>
                      <td><?php echo strtoupper($row->nom).' '.$row->prenom ?></td>
                      <td><?php echo ucwords($row->type) ?></td>
                      <td>
                          <div class="table-data-feature">
                            <button class="item" name="etat" onclick="location.href='gestion_demandes.php?id=<?php echo $row->id; ?>&check'" title="Accepter">
                                <i class="zmdi zmdi-check"></i>
                            </button>
                            <button class="item" name="etat" onclick="location.href='gestion_demandes.php?id=<?php echo $row->id; ?>&uncheck'" title="Refuser">
                                <i class="zmdi zmdi-close"></i>
                            </button>
                            <button class="item openModalInformation" data-toggle="tooltip" data-placement="top" id=""  title="Review">
                              <i class="zmdi zmdi-chevron-up"></i>
                            </button>
                          </div>
                      </td>
                    </tr>
          <?php
                }
            } else {
          ?>
                <tr><td colspan="4" style="text-align: center;">Y'a aucun demande pour le moment.</td></tr>

          <?php
            }
          ?>
            </tbody>
        </table>
    </div>
