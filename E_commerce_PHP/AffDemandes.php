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
							</br><h1>Demandes de dépannage</h1>
								<section id="banner">
									<div class="content">
										<header>
											
											
				<?php											
				    if (isset($_SESSION['id'])&& $_SESSION['statut'] >= 0)
					{
					        include 'fonctions.php';
					        $bdd  = connexionBDD(); 
					

							$req = $bdd->prepare('SELECT * FROM demandes WHERE membreID = :membreID');
							$req->execute(array(
							'membreID' => $_SESSION['id']));
							

				
						while ($donnees = $req->fetch())
						{ ?>
							</br></br>
							<a>- Vous avez demandé : </a></br><strong><a> <?php echo $donnees['typeDemande'] ?> </a></strong></br>
							<a>- Votre message pour le technicien :</a></br><strong><a>" <?php echo $donnees['Commentaire'] ?> "</a></strong></br>
				<?php		if($donnees['confirmation'] == 0){
								?><a class ="attention">-> Cette demande est en attente de validation</a> <?php }
							else{
								?><a class ="valide">-> Cette demande a été validée</a> <?php }
						}
					}
					
					if (!isset($_SESSION['id'])){
						echo "page innaccessible ...";
					}
					?>
					
										</header>
									</div>
									<span class="image object">
										<img src="images/pic10.jpg" alt="" />
									</span>
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