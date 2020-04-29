	<div class="modal-body enseignant">

		<!-- ===============un button pour ajoute un enseignant======================= -->
		<div class="col-6 col-md-4">
		    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Ajouter un Enseignant</button>
		    <br>
		    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		            <div class="modal-content">
		                <div class="modal-body">
		                    <form action="Enseignant/ajoute_enseignant.php" method="POST">
		                        <!-- =======================bloc de le nom et le prenom======================= -->
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
		                        <!-- ===================fin bloc de le nom et le prenom======================= -->

		                        <div class="form-group">
		                            <label for="date" class="col-form-label">Date Naissance</label>
		                            <input type="date" class="form-control" name="dateN" id="date" required>
		                        </div>

		                        <div class="form-group">
		                            <label for="email" class="col-form-label">Email</label>
		                            <input type="email" class="form-control" name="email" id="date" required>
		                        </div>

		                        <div class="modal-footer">
		                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		                            <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
		                        </div>
		                    </form>

		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- =====================================formilar poir modifier un enseignant========================================== -->

		<div class="modal fade" id="modifierUnEnseignant" tabindex="-1" role="dialog" aria-hidden="true">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">

		            <div class="modal-body">

		                <form action="Enseignant/modifier_enseignant.php" method="POST">
		                    <!-- =======================bloc de le nom et le prenom======================= -->
		                    <div class="row">
		                        <div class="col">
		                            <div class="form-group">
		                                <label for="le_nom_modifier" class="col-form-label">Nom </label>
		                                <input type="text" class="form-control" name="Nom" value="" id="le_nom_modifier" required>
		                            </div>
		                        </div>
		                        <div class="col">
		                            <div class="form-group">
		                                <label for="le_prenom_modifier" class="col-form-label">Prenom </label>
		                                <input type="text" class="form-control" name="prenom" value="" id="le_prenom_modifier" required>
		                            </div>
		                        </div>
		                    </div>
		                    <!-- ===================fin bloc de le nom et le prenom======================= -->

		                    <div class="form-group">
		                        <label for="date_modifier" class="col-form-label">Date Naissance</label>
		                        <input type="date" class="form-control" name="dateN" value="" id="date_modifier" required>
		                    </div>

		                    <div class="form-group">
		                        <label for="email_modifier" class="col-form-label">Email</label>
		                        <input type="email" class="form-control" name="email" id="email_modifier" value="" required>
		                    </div>

		                    <div class="modal-footer">
		                        <input type=hidden value="" name="id_enseignant" id="id_enseignant">
		                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		                        <button type="submit" class="btn btn-primary" name="Modifier">Modifier</button>
		                    </div>
		                </form>

		            </div>
		        </div>
		    </div>
		</div>
	<!-- =====================================end modifier un enseignant====================================== -->

	<br>
	<!-- confirmation de la suppression du responsable -->
	<div class="modal fade" id="confermationAle" tabindex="-1" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <form action="Filiere/supprimer_filiere.php" method="POST">
	                <div class="modal-body">
	                    <p style="color:#c0392b;">cet <strong>Enseignant</strong> est le responsable du filiere <strong id="fil"></strong></p>
	                    <p>Veuillez d'abord l'omettre de la responsabilité avant le supprimer.</p>
	                </div>
	                <div class="modal-footer">
	                    <input type="hidden" name="confirmation" id="confirmation" value="" />
	                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok!</button>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>

<?php
	include 'connection.php';
	$sql = "SELECT *FROM enseignant";

	$resultat = mysqli_query($conn, $sql);
	$resultatcheck = mysqli_num_rows($resultat);

	if ($resultatcheck > 0) {
?>
		<table class="table table-bordered table-striped mydatatable">
			<thead class="thead-dark">
				<tr>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Telephone</th>
					<th>Email</th>
					<th>supprimer</th>
					<th>Modifier</th>
				</tr>
			</thead>
			<tbody>
<?php

				while ($row = mysqli_fetch_assoc($resultat)) {
?>
					<tr>
						<td><?php echo $row["nom_enseignant"] ?></t>
						<td><?php echo $row["prenom_enseignant"] ?></td>
						<td><?php echo $row["telephone_enseignant"] ?></td>
						<td><?php echo $row["email_enseignant"] ?></td>
						<td>
							<?php
							$sqlF = " SELECT * FROM filiere WHERE responsable_id = '" . $row["id_enseignant"] . "'";
							$resultatF = mysqli_query($conn, $sqlF);
							$rowF = mysqli_fetch_assoc($resultatF);
							$checkF = mysqli_num_rows($resultatF);
							if ($checkF > 0) {
?>
								<img id="<?php echo $rowF["nom_filiere"] ?>" style="cursor:pointer;" width=20 heigth=20 src="https://bit.ly/2UwQb08" class="open-confirmation" data-toggle="modal">
<?php
							} else {
?>
								<a href="Enseignant/supprimer_enseignant.php?id=<?php echo $row["id_enseignant"] ?>">
									<img width=20 heigth=20 src="https://bit.ly/2UwQb08">
								</a>
<?php
							}
?>
						</td>
						<td>
							<input type="button" value="Modifier" id="<?php echo $row["id_enseignant"] ?>" data-toggle="modal" class="btn btn-info btn-xs Open_modifierEnseignant">
						</td>
					</tr>
<?php
				}
				echo "</tbody>";
				echo "</table>";
			}
?>
	<script>
    	$('.mydatatable').DataTable();
    </script>
</div>