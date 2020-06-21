<?php
	include '../../connection.php';
	include 'modals.php';
?>


<div class="table-responsive-sm">
	<?php
		$sql = "SELECT *
				FROM Personnel
				JOIN Utilisateur ON Personnel.id = Utilisateur.id";

		$resultat = mysqli_query($conn, $sql);
		$resultatcheck = mysqli_num_rows($resultat);

		if ($resultatcheck > 0) {
	?>
			<table class="table table table-borderless table-data3 mydatatable">
				<thead>
					<tr>
						<th>Nom Complet</th>
						<th>Telephone</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($row = mysqli_fetch_assoc($resultat)) {
					?>
						<tr>
							<td><?php echo $row["nom"].' '.$row["prenom"] ?></td>
							<td><?php echo $row["telephone"] ?></td>
							<td>
								<div class="table-data-feature" style="text-align: center">
									<?php
										$sqlF = "SELECT *
												FROM Filiere
												WHERE id_responsable = '" . $row["id"] . "'";
										$resultatF = mysqli_query($conn, $sqlF);
										$rowF = mysqli_fetch_assoc($resultatF);
										$checkF = mysqli_num_rows($resultatF);
										if ($checkF > 0) {
									?>
										<button id="<?php echo $rowF["nom_filiere"] ?>" class="item open-confirmationR" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Supprimer" >
											<i class="zmdi zmdi-delete"></i>
										</button>
									<?php
										} else {
											$sqlF = "SELECT *
													FROM Module
													WHERE id_enseignant = '" . $row["id"] . "'";
											$resultatF = mysqli_query($conn, $sqlF);
											$rowF = mysqli_fetch_assoc($resultatF);
											$checkF = mysqli_num_rows($resultatF);
											if ($checkF > 0) {
									?>
										<button id="<?php echo $rowF["intitule"] ?>" class="item open-confirmationE" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Supprimer" >
											<i class="zmdi zmdi-delete"></i>
										</button>
									<?php
											} else {
									?>
										<button onclick="location.href='supprimer_enseignant.php?id=<?php echo $row["id"] ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer" >
											<i class="zmdi zmdi-delete"></i>
										</button>
									<?php
											}
										}
									?>
									<button data-toggle="tooltip" id="<?php echo $row["id"] ?>" data-toggle="modal" class="item Open_modifierEnseignant" data-placement="top" title="Modifier" >
										<i class="zmdi zmdi-edit"></i>
									</button>
								</div>
							</td>
						</tr>
	<?php
					}
				echo "</tbody>";
			echo "</table>";
			}
	?>
</div>
<script>
$('.mydatatable').DataTable();
</script>
<script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>