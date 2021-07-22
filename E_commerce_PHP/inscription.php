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
									<a href="inscription.php" class="logo"><strong>Inscrivez vous en 2 minutes</strong> pour demander un dépannage à distance</a>
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
											<h1>Inscription<br /></h1>
											
											
				<?php
				
					include 'fonctions.php';
					$bdd  = connexionBDD(); 
											
                    if(!isset($_SESSION['id']))
					{
					if (!isset($_POST['mdp'])){
						if (isset($_GET['errMDP'])){ ?>
							<p>Vous n'avez pas entré le même mot de passe dans 'Vérification'</p></br>
						<?php }
						else if(isset($_GET['errIdent'])){ ?>
							<p>Votre mail ou votre pseudo est déjà utilisé</p></br>
						<?php } ?>
                    <form action="inscription.php" method="post" >
						  Pseudo<input type="text" name="pseud"></input>
						  Adresse Mail<input type="email" name="mail"></input>
						  Mot de passe<input type="password" name="mdp"></input>
						  Vérification<input type="password" name="verifmdp"></input>
						  Nom<input type="text" name="nom"></input>
						  Prénom<input type="text" name="prenom"></input>
						  Adresse<input type="text" name="adresse"></input>
						  Tel<input type="text" name="telephone"></input>
						  Êtes vous un robot ? 4 x 4 ? <input type="text" name="verif"></input></br>
						  <input type="submit" value="Valider">
					</form>
					<?php
					}
				
					 
					elseif(isset($_POST['mdp']))
					{
							$ok = 1;
							
							echo "Verif...";
						
							$reponse = $bdd->query('SELECT * FROM membres');
							while($donnees = $reponse->fetch())
							{
							if( $donnees['Pseudo'] == $_POST['pseud'] OR $donnees['Email'] == $_POST['mail'])
							{
								$ok = 0;
								echo "Recommencez svp, votre pseudo/mail est déjà utilisé.";
								header('Location: inscription.php?errIdent=1');
							}
							else if($_POST['mdp'] != $_POST['verifmdp'])
							{
								$ok = 0;
								header('Location: inscription.php?errMDP?errMDP=1');
							}
							}
							if($ok == 1)
							{
								if($_POST['verif'] == "16")//question sécurité pour véréfier s'il s'agit d'un bot
								{
								$ip = $_SERVER["REMOTE_ADDR"];
								$pseudo = $_POST['pseud'];
								$pass_hache = sha1($_POST['mdp']);
								$pass_hache = $_POST['mdp'];
								$email = $_POST['mail'];
								$nom = $_POST['nom'];
								$prenom = $_POST['prenom'];
								$adresse = $_POST['adresse'];
								$tel = $_POST['telephone'];
								
								echo $ip;?><br/><?php
								echo $pseudo;?><br/><?php
								echo $pass_hache;?><br/><?php
								echo $email;?><br/><?php
								echo $nom;?><br/><?php
								echo $prenom;?><br/><?php
								echo $adresse;?><br/><?php
								echo $tel;
								
								$req = $bdd->prepare('INSERT INTO membres(DateInscr, AddIP, Pseudo, Nom, Prenom, Email, MDPUser, Adresse, Tel) VALUE(CURDATE(),:ip, :pseudo, :nom, :prenom, :email, :passHache, :adresse, :tel)');
								$req->execute(array(
								'pseudo' => $pseudo,
								'passHache' => $pass_hache,
								'email' => $email,
								'ip' => $ip,
								'nom' => $nom,
								'prenom' => $prenom,
								'adresse' => $adresse,
								'tel' => $tel));
								
								echo "Vous avez été inscrit(e) !!!";
								
								$message = "Le membre :".$pseudo." s'est inscrit";//On envoie un mail
								// Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
								mail('julianbesnard77@hotmail.fr', 'Inscription !', $message,'');
								
								header('Location: connexion.php');
								}
								else
								{
									echo "Code de bot invalide !";
								}
							}
							else
							{
								echo "recommencez SVP.";
							}
							
					
					}
					}
					else
					{
						echo "Vous êtes déjà connecté";
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