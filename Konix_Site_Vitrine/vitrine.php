<div style="font-family: 'Montserrat', sans-serif;">
    <div class="Vitrine_Haut">
        Concepteur web  |  Paris
    </div>
    
    <div class="Vitrine Vitrine_Part_1">
        <div style="text-align: center;font-family: 'Montserrat', sans-serif;"><%= entreprise.Nom %></div>
        <div class="Vitrine_Devise"><%= entreprise.DeviseEntreprise %></div>
    </div>
    
    <div class="Vitrine Vertical">
        <div class="Vitrine_moitier Vitrine_moitier_gauche"> 
            
        </div>
        <div class="Vitrine_moitier Vitrine_PorteFolio_text">
            <div>N'hesitez pas a regardez les projet que l'on a deja realiser </div>
            <div><br></div>
            <div class="Vitrine_PorteFolio_bouton"><a href="" class="">Potefolio</a></div> 
        </div>
    </div>
    
    <div class="Vitrine Vitrine_Email">
        <div class="Vitrine_Email_Text">
            <div>Un souci ? Une question ? N'hésitez pas contactez-nous </div>
            <div><br></div>
            <div><a href='mailto:<%= entreprise.AddresseEntreprise %>' target=_blank>Contact</a></div> 
        </div>
        
    </div>
    
    <div class="Vitrine Vitrine_QFN">
        <div class="Vitrine_QFN_Text">
            <div>Que faisons-nous ?</div>
            <div><br></div>
            <div>Création de site en tout genre ou reprise d’un site déjà existant pour entreprise ou particulier </div>
    
            <div class="Vertical">
                <div>
                    <div class="Horizontal"> 
                        <div><img src="/img/Vitrine/Image_Fonctionnel.png" alt="Fonctionnel" class="Vitrine_QFN_image"></div>
                        <div>Fonctionnel</div>
                    </div>
                </div>
                <div style="margin-left: 50px;">
                    <div class="Horizontal"> 
                        <div><img src="/img/Vitrine/Image_Responsive.png" alt="Responsive" class="Vitrine_QFN_image"></div>
                        <div>Responsive design</div>
                    </div>
                </div>
                <div style="margin-left: 50px;">
                    <div class="Horizontal"> 
                        <div><img src="/img/Vitrine/Image_Creation.png" alt="Creation" class="Vitrine_QFN_image"></div>
                        <div>Création personnalisable</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="Vitrine Vitrine_Deroulement">
        <div class="Vitrine_QFN_Text">
            <div>Déroulement de la création</div>
            <div><br></div>
            <div class="Vertical">
                <div>
                    <div class="Horizontal"> 
                        <div>Organisation </div>
                        <div><img src="/img/Vitrine/Image_Organisation.png" alt="Fonctionnel" class="Vitrine_QFN_image"></div>
                        <div>
                            <ul>
                                <li>Rendez-vous avec le client pour la création du cahier des charges</li>
                                <li>Analyse et recherche d’éventuelle demande</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div style="margin-left: 50px;">
                    <div class="Horizontal"> 
                        <div>Programmation</div>
                        <div><img src="/img/Vitrine/Image_Programmation.png" alt="Responsive" class="Vitrine_QFN_image"></div>
                        <div>
                            <ul>
                                <li>Développement du site</li>
                                <li>Mise en place d’un design</li>
                                <li>Rendez-vous pour voir si le site est conforme au client</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div style="margin-left: 50px;">
                    <div class="Horizontal"> 
                        <div>Mise en ligne</div>
                        <div><img src="/img/Vitrine/Image_Mise_en_ligne.png" alt="Creation" class="Vitrine_QFN_image"></div>
                        <div>
                            <ul>
                                <li>Déploiement du site</li>
                                <li>Mise en place des mentions légale et RGPD</li>
                                <li>Maintenance du site</li>
                                <li>Hébergement et création d’un nom de domaine (Optionnelle)</li>
                                <li>Mise à jour du site (Optionnelle)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="Vitrine_Bas">
        <div class="Vitrine_Bas_milieu">
            <div><%= entreprise.Nom %>, Solutions en développement informatique</div>
            <div style="padding-left: 23%;"><img src='img/logo_blanc.png' alt=<%= entreprise.Nom %> class = 'Principal_logo_fin'/></div>
            <div>Copyright © <%= entreprise.Date %> <%= entreprise.Nom %> - Tous droits réservés</div>
            <div>Webmaster : <a href='mailto:<%= entreprise.AddresseEntreprise %>' target=_blank><%= entreprise.Nom %></a></div>
            <div>Model : <a href='https://www.panplume.fr/' target=_blank>Panplume</a></div>
        </div>
    </div>    
</div>