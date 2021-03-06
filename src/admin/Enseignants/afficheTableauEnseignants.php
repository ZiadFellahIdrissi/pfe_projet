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
	?>
	<table class="table table table-borderless table-hover mydatatable">
		<thead class="thead-dark">
			<tr>
				<th>Numéro SOM</th>
				<th>Nom Complet</th>
				<th>Telephone</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if ($resultatcheck > 0) {
				while ($row = mysqli_fetch_assoc($resultat)) {
			?>
					<tr>
						<td><?php echo $row["som"] ?></td>
						<td><?php echo $row["nom"] . ' ' . $row["prenom"] ?></td>
						<td style="text-align: center;"><?php echo $row["telephone"] ?></td>
						<td>
							<div class="table-data-feature">
								<?php
								$idProf = $row["id"];
								$sqlF = "SELECT *
													FROM Filiere
													WHERE id_responsable = '$idProf'";
								$resultatF = mysqli_query($conn, $sqlF);
								$rowF = mysqli_fetch_assoc($resultatF);
								$checkF = mysqli_num_rows($resultatF);
								if ($checkF > 0) {
								?>
									<button id="<?php echo $rowF["nom_filiere"] ?>" class="item open-confirmationR" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Supprimer">
										<i class="zmdi zmdi-delete"></i>
									</button>
									<?php
								} else {
									$idProf = $row["id"];
									$sqlF = "SELECT *
														FROM Module
														WHERE id_enseignant = '$idProf'";
									$resultatF = mysqli_query($conn, $sqlF);
									$rowF = mysqli_fetch_assoc($resultatF);
									$checkF = mysqli_num_rows($resultatF);
									if ($checkF > 0) {
									?>
										<button id="<?php echo $rowF["intitule"] ?>" class="item open-confirmationE" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Supprimer">
											<i class="zmdi zmdi-delete"></i>
										</button>
									<?php
									} else {
										$id = $row["id"];
									?>
										<button onclick="location.href='supprimer_enseignant.php?id=<?php echo $id ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
											<i class="zmdi zmdi-delete"></i>
										</button>
								<?php
									}
								}
								?>
								<button data-toggle="tooltip" id="<?php echo $row["id"] ?>" data-toggle="modal" class="item Open_modifierEnseignant" data-placement="top" title="Modifier">
									<i class="zmdi zmdi-edit"></i>
								</button>
								<button class="item openModalInformation" data-toggle="tooltip" data-placement="top" id="<?php echo $row["id"] ?>" title="lus d'informations">
									<i class="zmdi zmdi-more"></i>
								</button>
							</div>
						</td>
					</tr>
				<?php
				}
			} else {
				?>
				<tr>
					<td colspan="3" style="text-align: center;">Aucun enseignant n'est trouvé.</td>
				</tr>
			<?php
			}
			echo "</tbody>";
			echo "</table>";
			?>
</div>
<script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>