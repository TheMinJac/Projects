<?php 
session_start();
//ici c'est la vérification dezs données qu'on envoie à stripe

include 'fonctions.php';
require('stripe.php');//ici on créé un customer pour stripe


$stripe = new Stripe('sk_live_AueCnJBK1jLLZn9d9EC1scfF');
if(isset($_GET['NouvCB']))
{
	$token = $_POST['stripeToken'];
	$email = $_POST['email'];
	$name = $_POST['name'];

	echo $_POST['stripeToken']."-----";
	echo $_POST['email']."-----";
	echo $_POST['name'];
	
	if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name) && !empty($token)){
		$customer = $stripe->api('customers', [
		'source' => $token,
		'description' => $name,
		'email' => $email
	]);
	if ($customer==null)
	{
		header('Location: DemandeDep.php?erreurPay=1');
	}
	
	
	$customer = json_decode(json_encode($customer), true);//convertir un stdClass en array (tableau)
	$idCustomer = $customer['id'];

	echo "nouvelle carte enregistré";
	
	
	}	
	
	
	
}

else if(!isset($_GET['NouvCB']))//si ce n'est pas une nouvelle cb on vérifie quand meme si le customer existe
{
		$bdd  = connexionBDD();
		$customer2 = recupMembre($bdd, $_SESSION['id']);
		$idCustomer = $customer2['idCustom'];
	
}


if($idCustomer == '0' OR $idCustomer == null)//si on n' a pas d'id customer c'est qu'il n'y a pas de customer
{
	header('Location: DemandeDep.php?erreurPay=1');
}
else if ($idCustomer != '0' AND $idCustomer != NULL){//si pas d'erreur on ajoute 

 $bdd  = connexionBDD(); 
//ici on va update la table demandes, en mettant que la demande a été prépayé
 $req = $bdd->prepare('UPDATE demandes SET paye = "prépayé" WHERE id = :id');
 $req->execute(array(
 'id' => $_POST['idDemande']));	

  //die('Votre paiement est bien enregistré!');	
 
}




	$bdd  = connexionBDD(); 
	$req = $bdd->prepare('UPDATE membres SET idCustom = :idCustom WHERE id = :id');//!\id customer ajouté au membre
	$req->execute(array(
	'idCustom' => $idCustomer,
	'id' => $_SESSION['id']));
	
	//envoie du mail au technicien
	$message = "Le membre".$_SESSION['Pseudo']."à fait une demande de dépannage";
	// Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
	mail('julianbesnard77@hotmail.fr', 'Alerte dépannage !', $message);
	
	header('Location: AffDepannage.php');
		
	curl_close($customer);

	die();
	header('Location: AffDepannage.php');
	


/* curl https://api.stripe.com/v1/charges \
- u sk_test_clé: \
-d amount=2000 \
-d currency=usd \
-d customer=cus_id
*/

?>


