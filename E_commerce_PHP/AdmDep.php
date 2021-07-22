<?php session_start(); ?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Dépannage PC</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
								    <?php if(!isset($_SESSION['id'])) { ?>
									<a href="inscription.php" class="logo"><strong>Inscrivez vous</strong> pour demander un dépannage à distance</a>
								    <?php }
									else { ?>
									<a href="inscription.php" class="logo">Bienvenue <strong><?php echo $_SESSION['Pseudo']; ?> </strong></a>
									<?php      } ?>
									<ul class="icons">
								
										<?php if(!isset($_SESSION['id'])) { ?>
										<li><a href="inscription.php" class="boutonConnexion"><span class="boutonConnexion">Inscription</span></a></li>
										<li><a href="connexion.php" class="boutonConnexion"><span class="boutonConnexion">Connexion</span></a></li>
										<?php }
											  else { ?>
										<li><a href="deco.php" class="boutonConnexion"><span class="boutonConnexion">Deconnexion</span></a></li>
									    <?php      } ?>
								</header>

							<!-- Banner -->
							</br><h1>Dépannages</h1>
								<section id="banner">
									<div class="content">
										<header>
											
											
				<?php											
				    if (isset($_SESSION['id']) && $_SESSION['statut'] == 1)
					{
					        include 'fonctions.php';
					        $bdd  = connexionBDD(); 
					
							$req = $bdd->query('SELECT * FROM demandes');
							?>
							<table>
							<tr>
								<th>Membres</th>
								<th>Email</th>
								<th>Date de demande</th>
								<th>Date du RDV</th>
								<th>Horaires</th>
								<th>TeamViewer</th>
								<th>Mdp TV</th>
								<th>PC</th>
								<th>Type de panne</th>
								<th>Commentaire</th>
								<th>Payé</th>
								<th>Validation</th>
							</tr>
					<?php   while ($donnees = $req->fetch())
						{ 
							//on récupère le pseudo du membre de cette demande à partir de son ID marqué dans la demande
							$donneesMbr = recupMembre($bdd, $donnees['membreID']);
					?>	
							<tr>
								<td> <?php echo $donneesMbr['Pseudo'] ?> </td>
								<td> <?php echo $donneesMbr['Email'] ?> </td>
								<td> <?php echo $donnees['date'] ?> </td>
								<td> <?php echo $donnees['dateRDV'] ?> </td>
								<td> <?php echo $donnees['horaire'] ?> </td>
								<td> <?php echo $donneesMbr['TeamViewer'] ?> </td>
								<td> <?php echo $donnees['mdpTV'] ?> </td>
								<td> <?php echo $donnees['PC'] ?> </td>
								<td> <?php echo $donnees['typePanne'] ?> </td>
								<td> <?php echo $donnees['Commentaire'] ?> </td>
								
								<td> <?php if($donnees['paye'] == 'prépayé' ){?> <a title="Cliquer pour valider le paiement, après un dépannage réussi" href="validerPaiement.php?IDDemande=<?php echo $donnees['id'] ?>&NOOK=0&membreID=<?php echo $donnees['membreID'] ?> " ><?php } ?> <strong> <?php echo $donnees['paye'] ?></strong></a></td>
								
								<td> <?php if($donnees['confirmation']==1) { ?> <a title="Cliquer pour mettre en attente la demande" href="validerDemande.php?IDDemande=<?php echo $donnees['id'] ?>&OK=1" ><strong>OK</strong></a>  <?php } else if($donnees['confirmation']==0) { ?> <a title="Cliquer pour valider la demande" href="validerDemande.php?IDDemande=<?php echo $donnees['id'] ?>" > <strong>En attente</strong></a>  <?php } ?> </td>
							</tr>
							
					<?php		
						} ?>
						</table>
						<?php
					}
					if (!isset($_SESSION['id'])){
						echo "page innaccessible ...";
					}
					?>
					
										</header>
									</div>

								</section>

							<!-- Section -->


						</div>
					</div>

						<?php include("Sidebar.php"); ?>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>