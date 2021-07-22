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

	<script>
	if(location.search == '?erreurPay=1')
	{
		alert('Erreur lors du paiement, veuillez réessayer ou entrer de nouveau les données de votre carte');
	}
	</script>
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
								<section id="banner">
									<div class="content">
										<header>

					 <?php 
						    include 'fonctions.php';
					        $bdd  = connexionBDD(); 
							
						
					if(isset($_SESSION['id'])&& $_SESSION['statut'] >= 0)
					{
						if (!isset($_POST['typeDep2']) && !isset($_POST['typeDep'])){
					?>
                   <form action="DemandeDep.php" method="post" >
						  <h3>Votre demande</h3>
						  <select name="typeDep">
						  <option>Site vitrine
						  <option>Site E-commerce
						  <option>Intranet
						  <option>Site institutionnel
						  </select></br>
						  <input type="submit" value="Suivant">
					</form>
						<?php }
						else if (isset($_POST['typeDep'])){ 
						
							if($_POST['typeDep'] == 'Site vitrine'){  ?>
                   <form action="DemandeDep.php" method="post" >
						  <h3>Détaillez votre demande</h3>
						  <a>Vous pouvez détailler rapidement votre demande.</a></br></br></br>
						  Description de votre demande<TEXTAREA name="commentaire" rows=4 cols=40>N'hésitez pas à détailler votre demande : Style de site, theme particulier...</TEXTAREA>
						  <a>Après avoir validé la demande, nous seront prévenu et vous serez contacter le plus rapidement possible.</a></br></br>
						  <input type="HIDDEN" name="typeDep2" value='<?php echo $_POST['typeDep'] ?>' ></input>
						  <input type="submit" value="Valider la demande">
					</form>
						<?php }
						    else if ($_POST['typeDep'] == 'Site E-commerce' || $_POST['typeDep'] == 'Intranet' || $_POST['typeDep'] == 'Site institutionnel'){ ?>
                                     <form action="DemandeDep.php" method="post" >
						  <h3>Détaillez votre demande</h3>
						  <a>Vous pouvez détailler rapidement votre demande.</a></br></br></br>
						  Description de votre demande<TEXTAREA name="commentaire" rows=4 cols=40>N'hésitez pas à détailler votre demande : Style de site, theme particulier, nombre de membres ...</TEXTAREA>
						  <a>Après avoir validé la demande, nous seront prévenu et vous serez contacter le plus rapidement possible.</a></br></br>
						  <input type="HIDDEN" name="typeDep2" value='<?php echo $_POST['typeDep'] ?>' ></input>
						  <input type="submit" value="Valider la demande">
					</form>
						<?php }
								
						}
						else if (isset($_POST['typeDep2'])){ //On valide la demande ici en envoyant les données à la bdd
							echo "Pour : " . $_POST['typeDep2'];
							
							
							
							$req = $bdd->prepare('INSERT INTO demandes(date, membreID, typeDemande, Commentaire) VALUE(CURDATE(), :membreID, :typeDemande, :Commentaire)');
							$req->execute(array(
							'membreID' => $_SESSION['id'],
							'typeDemande' => $_POST['typeDep2'],
							'Commentaire' => $_POST['commentaire']));	
							
							$idDemande = $bdd->lastInsertId();; //on récupère le dernier id entré (celui de la dernière demande en l'occurence) 
							
							$message = "Le membre :".$_SESSION['Pseudo']." à fait une demande de site";//On envoie un mail
							mail('julianbesnard77@hotmail.fr', 'Demande site', $message,'');
							?>
						<form action="AffDemandes.php" method="post" >	
						<input name="idDemande" type="hidden" value= <?php echo $idDemande ?> ><!-- Valeur envoyé caché (id de la demande) -->
						<input type="submit" value="Voir mes demandes">
						</form>
			<?php			}
						
						} ?>
										</header>
										<p>"texte présentation"</p>
										<ul class="actions">
											<li><a href="#" class="button big">Learn More</a></li>
										</ul>
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