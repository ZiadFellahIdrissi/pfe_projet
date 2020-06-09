	<div class="modal-body enseignant">

		<!-- ===============un button pour ajoute un enseignant======================= -->
		<div class="col-6 col-md-4">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
			+ Ajouter</button>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<form action="ajoute_enseignant.php" method="POST">
								<!-- =======================nom et prenom======================= -->
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label for="le_nom" class="col-form-label">Nom </label>
											<input type="text" class="form-control" name="Nom" id="le_nom" required>
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label for="le_prenom" class="col-form-label">Prenom </label>
											<input type="text" class="form-control" name="prenom" id="le_prenom" required>
										</div>
									</div>
								</div>

								<!-- =================== cin, date naissance ======================= -->
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label for="cin" class="col-form-label">Cin</label>
											<input type="text" class="form-control" name="cin" id="cin" required>
										</div>
										<div class="col">
											<label for="dateN" class="col-form-label">Date Naissance</label>
											<input type="date" class="form-control" name="dateN" id="dateN" required>
										</div>
									</div>
								</div>

								<!-- =================== telephone ======================= -->
								<div class="form-group">
									<label for="numTel" class="col-form-label">Numéro du téléphone</label>
									<input type="text" class="form-control" name="numTel" id="numTel" required>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
									<button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- =====================formilar poir modifier un enseignant==================== -->

		<div class="modal fade" id="modifierUnEnseignant" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<form action="modifier_enseignant.php" method="POST">
							<!-- =======================bloc de le nom et le prenom======================= -->
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="le_nom_modifier" class="col-form-label">Nom </label>
										<input type="text" class="form-control" name="Nom" id="le_nom_modifier" required>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label for="le_prenom_modifier" class="col-form-label">Prenom </label>
										<input type="text" class="form-control" name="prenom" id="le_prenom_modifier" required>
									</div>
								</div>
							</div>

							<!-- =================== cin, date naissance ======================= -->
							<div class="form-group">
								<div class="row">
									<div class="col">
										<label for="cin_modifier" class="col-form-label">Cin</label>
										<input type="text" class="form-control" name="cin" id="cin_modifier" required>
									</div>
									<div class="col">
										<label for="dateN_modifier" class="col-form-label">Date Naissance</label>
										<input type="date" class="form-control" name="dateN" id="dateN_modifier" required>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="tel_modifier" class="col-form-label">Numéro du téléphone</label>
								<input type="text" class="form-control" name="numTel" id="tel_modifier" required>
							</div>

							<div class="modal-footer">
								<input type=hidden value="" name="oldCin" id="id_enseignant">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
								<button type="submit" class="btn btn-primary" name="Modifier">Modifier</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<!-- ======================end modifier un enseignant======================== -->

		<br>
		<!-- confirmation de la suppression du responsable -->
		<div class="modal fade" id="confermationR" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<p style="color:#c0392b;">cet <strong>Enseignant</strong> est le responsable du filiere <strong id="fil"></strong>!</p>
						<span>Veuillez d'abord l'omettre de la responsabilité avant de le supprimer.</span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
					</div>

				</div>
			</div>
		</div>
		<!-- confirmation de la suppression d'enseignant d'un module -->
		<div class="modal fade" id="confermationE" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<p style="color:#c0392b;">cet <strong>Enseignant</strong> est celui qui est en charge du module <strong id="module"></strong>!</p>
						<span>Veuillez d'abord le dispenser de la responsabilité avant de le supprimer.</span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
					</div>

				</div>
			</div>
		</div>


		<div class="table-responsive-sm">
			<?php
			include '../../connection.php';
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

	</div>
	<script>
		$('.mydatatable').DataTable();
	</script>
	<script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>