<?php session_start(); ?>

											
				<?php											
				    if (isset($_SESSION['id']) && $_SESSION['statut'] == 1)
					{
						include 'fonctions.php';
					    $bdd  = connexionBDD(); 
						
						if(!isset($_GET['OK']))//si la demande est en attente, donc OK n'est pas envoyé
						{
								$req = $bdd->prepare('UPDATE demandes SET confirmation = 1 WHERE id = :id ');
								$req->execute(array(
								'id' => $_GET['IDDemande']));
						}
						else if(isset($_GET['OK']))
						{
							$req = $bdd->prepare('UPDATE demandes SET confirmation = 0 WHERE id = :id ');
							$req->execute(array(
							'id' => $_GET['IDDemande']));
						}
					}
					if (!isset($_SESSION['id'])){
						echo "page innaccessible ...";
					}
					header('Location: AdmDep.php');
					?>
					
