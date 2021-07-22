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
								<section id="banner">
									<div class="content">
										<header>
											<h1>Paiement<br /></h1>
											
											
				<?php											
				    if (!isset($_SESSION['id']))
					{
						echo 'page innaccessible';
					}
					
					else if (isset($_SESSION['id'])){
					?>
				    <?php include("fonctions.php"); 
						  $bdd  = connexionBDD();
						  $membre = recupMembre($bdd, $_SESSION['id']);
						  if($membre['idCustom']!=null AND $membre['idCustom']!='0')//si on a déjà une carte d'enregistré dans le membre (la table membres)
						  { 
							?> 
							  <form action="paiement.php" method="post" >
							  Utiliser cette carte : <?php echo $membre['last4'] ?> </br>
							  <input name="idDemande" type="hidden" value= <?php echo $_POST['idDemande'] ?> ><!-- id de la demande recupéré de demandeDep.php -->
							  <input type="submit" value="Valider Paiement">
							  </form>
				   <?php  } ?>
						  Nouvelle Carte :</br>
					<form action="paiement.php?NouvCB=1" method="post" id="payment_form" >

						  Nom <input type="text" name="name" required value= " <?php echo $_SESSION['nom'] ?> "></input></br>
						  adresse E-mail <input type="email" name="email" required value= " <?php echo $_SESSION['mail'] ?> "></input></br>
						  Numéro de carte bancaire <input value="4242424242424242" type="text" name="numeroCB" required data-stripe="number"></input></br>
						  
						  Date validitée
						  <select input type="text" name="moisValid" data-stripe="exp_month">
						  <?php for($i = 1; $i<=12; $i++){ ?>
						  <option> <?php if($i<10){echo "0".$i;}else{echo $i;} ?>
						  <?php } ?>
						  </select></br>
						  <select input type="text" name="anneeValid" data-stripe="exp_year">
						  <?php for($i = 2019; $i<=2030; $i++){ ?>
						  <option> <?php echo $i ;?>
						  <?php } ?>
						  </select></br>
						  Code cb<input type="text" name="cvc" required data-stripe="cvc" value="123"></input></br>
						  <input name="idDemande" type="hidden" value= <?php echo $_POST['idDemande'] ?> ><!-- id de la demande recupéré de demandeDep.php -->
						  <input type="submit" value="Valider Paiement">
					</form>
						  
					<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
					<script>
						Stripe.setPublishableKey('pk_live_AbQKB40jGT6RX36rKTfvRK0Q')
						var $form = $('#payment_form')
						$form.submit(function (e) {
							e.preventDefault()
							$form.find('.button').attr('disabled', true)
							Stripe.card.createToken($form, function (status, response) {
							
								if(response.error){
									$form.find('.message').remove();
									$form.prepend('<div><p>' + response.error.message + '</p></div>');
								}
								else {
									var token = response.id
									$form.append($('<input type="hidden" name="stripeToken">').val(token))
									$form.get(0).submit()
								}
							
							})
						})
						
					</script> 
					<?php } ?>
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