				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<!-- <section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.php">Accueil</a></li>
										<?php if(!isset($_SESSION['id'])) { ?>
										<li><a href="inscription.php">Inscription</a></li>
										<?php } ?>
										
										<?php if(isset($_SESSION['id']) && $_SESSION['statut'] >= 0) { ?>
										<li>
											<span class="opener">PROFIL</span>
											<ul>
												<li><a href="AffDepannage.php">Mon Dépannage</a></li>
												<li><a href="DemandeDep.php">Demander un Dépannage</a></li>
										<?php   if($_SESSION['statut'] == 1){ ?>
													<li><a href="AdmDep.php">Liste dépannages</a></li>
										<?php   } ?>
												<li><a href="deco.php">Se déconnecter</a></li>
											</ul>
										</li>
										<?php } ?>
										<li><a href="aide.php">Aide</a></li>
									</ul>
								</nav>

							<!-- Section -->
								<!--<section>
									<header class="major">
										<h2>Ante interdum</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
									</div>
									<ul class="actions">
										<li><a href="#" class="button">More</a></li>
									</ul>
								</section> -->

							<!-- Section -->
								<section>
									<header class="major">
										<h2>À propos</h2>
									</header>
									<p>Dépannage à distance basé sur la satisfaction du client.</p>
									<ul class="contact">
										<li class="fa-envelope-o"><a href="#">mail : contact@dist-depannage.fr</a></li>
										<!--<li class="fa-phone">(000) 000-0000</li>
										<li class="fa-home">1234 Somewhere Road #8254<br />
										Nashville, TN 00000-0000</li>-->
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>. Site conçu par Julian Besnard et basé sur un design de HTML5 UP.</p>
								</footer>

						</div>
					</div>