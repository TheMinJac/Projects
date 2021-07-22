<?php
	function connexionBDD()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=distdepaigroot;charset=utf8', 'root', '');
		return $bdd;
	} 
	function recupMembre($bdd, $ID)//on recup ttes les info d'un membre à partir de son ID
	{
		$reponse = $bdd->query('SELECT * FROM membres WHERE id=\'' . $ID . '\'');
		$donnees = $reponse->fetch();

		return $donnees;
	}
	function recupIDmbr($emailMbr)//pas sur de cette fonction
	{
		$reponse = $bdd->query('SELECT nom FROM membres WHERE email=\'' . $emailMbr . '\'');
		return $reponse;
	}
	function recupPseudo($bdd, $ID)//pas sur de cette fonction
	{
		$reponse = $bdd->query('SELECT Pseudo FROM membres WHERE id=\'' . $ID . '\'');
		return $reponse;
	}
	
	function recupCustom($bdd, $id)//ici on récupère le membre avec en plus les derniers chiffre de la cb de l'utilisateur
	{
	$req = $bdd->prepare('SELECT * FROM membres WHERE Id = :id ');
	$req->execute(array(
	'id' => $id));

	$membre = $req->fetch();
	
	require('stripe.php');//ici on récupère le customer
	$stripe = new Stripe('sk_live_AueCnJBK1jLLZn9d9EC1scfF');
	$customer = $stripe->api('customers/'.$membre['idCustom'] , [null]);

	$customer = json_decode(json_encode($customer), true);//convertir un stdClass en array (tableau)
	
	
	return $customer;
	
		
	curl_close($customer);

	die();
	}
	
	

	
	
	
	
?>