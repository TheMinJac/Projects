


<?php session_start(); 
										
if (isset($_SESSION['id']) && $_SESSION['statut'] == 1)
{

		
	if(isset($_GET['NOOK']))
	{
		include 'fonctions.php';
		$bdd  = connexionBDD(); 
		require('stripe.php');//ici on créé un customer pour stripe
		
		$stripe = new Stripe('sk_live_AueCnJBK1jLLZn9d9EC1scfF');
		
		$customer = recupMembre($bdd, $_SESSION['id']);
		$idCustomer = $customer['idCustom'];
		
		
		
		//on va effectuer la 'charge' Stripe pour permettre la transaction (le paiement)

		$charge = $stripe->api('charges', [ // ici on charge une commande avec l'id d'un customer
		'amount' => 800,
		'currency' => 'eur',
		'customer' => $idCustomer
		]);
		if ($charge==0)
		{
		header('Location: AdmDep.php?erreurPay=1');
		}
		$charge = json_decode(json_encode($charge), true);//convertir un stdClass en array (tableau)
		$bdd  = connexionBDD(); //on va update le membre et lui mettre ces 4 derniers chiffres maintenant en bdd car on ne peut récup ces infos dans un customer enregistré dans Stripe
		$req = $bdd->prepare('UPDATE membres SET last4 = :last4 WHERE id = :id');
		$req->execute(array(
		'last4' => $charge['source']['last4'], //ICI on va actualiser les 4 derniers chiffres cb du membre en question, on peut le faire qu'après une Charge Stripe
		'id' => $_GET['membreID']));
		
		echo $_GET['IDDemande'];
		
		$req = $bdd->prepare('UPDATE demandes SET paye = "payé" WHERE id = :id ');
		$req->execute(array(
		'id' => $_GET['IDDemande']));
	}

}
if (!isset($_SESSION['id'])){
	echo "page innaccessible ...";
}
header('Location: AdmDep.php');
?>
			