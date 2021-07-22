<!DOCTYPE HTML>
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
								<section id="banner">
									<div class="content">
										<header>
											<h1>Connexion<br /></h1>
											
											
				<?php											
				    if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
					{
						echo 'Bonjour ' . $_SESSION['pseudo'];
					}
					
					if (!isset($_POST['mdp'])){
						if(isset($_GET['mauvIdent']))
						{
							echo 'Mauvais identifiant ou mot de passe.';
						}
					?>
                    <form action="connexion.php" method="post" >
						  Adresse Mail<input type="email" name="mail"></input>
						  Mot de passe<input type="password" name="mdp"></input></br>
						  <input type="submit" value="Valider">
					</form>
					<?php
					}
				
					 
					elseif (isset($_POST['mail']) AND isset($_POST['mdp']))
					{
							session_start();
							
							echo "Verification...";
					        include 'fonctions.php';
					        $bdd  = connexionBDD(); 
						
							$pass_hache = sha1($_POST['mdp']);
							$pass_hache = $_POST['mdp'];
							$mail = $_POST['mail'];

							// Vérification des identifiants
							$req = $bdd->prepare('SELECT * FROM membres WHERE Email = :mail AND MDPUser = :mdp');
							$req->execute(array(
								'mail' => $mail,
								'mdp' => $pass_hache));

							$resultat = $req->fetch();

							if (!$resultat)
							{
								echo 'Mauvais identifiant ou mot de passe !';
								header('Location: connexion.php?mauvIdent=1');
							}
							else
							{
								$_SESSION['id'] = $resultat['id'];
								$_SESSION['nom'] = $resultat['Nom'];
								$_SESSION['Pseudo'] = $resultat['Pseudo'];
								$_SESSION['mail'] = $mail;
								$_SESSION['statut'] = $resultat['statut'];
								echo 'Bonjour ' . $_SESSION['Pseudo'];
								echo '     Vous êtes connecté !';
								header('Location: index.php');
								
							}
							
					
					}
					?>

					
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