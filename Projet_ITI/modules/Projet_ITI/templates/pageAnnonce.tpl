<body>
    <header >
        {$WELCOMEUSERCONNECTED}
        <a id ="lienLogout" href="{jurl 'Projet_ITI~deconnexion@classic'}"> Me déconnecter</a>
    </header>
    
<div id="blockOptions">
        <div id="ongletMonCompte">
            <a id ="lienMonCompte" href="{jurl 'Projet_ITI~accueilCompte@classic'}"> Mon Compte</a>
        </div>
        
        <div id="ongletDeposerAnnonce">
            <a id ="lienDeposerAnnonce" href="{jurl 'Projet_ITI~deposer@classic'}"> Déposer une annonce</a>
        </div>
        
        <div id="ongletAnnonces">
            <a id ="lienToutesAnnonces" href="{jurl 'Projet_ITI~afficherToutesLesAnnonces@classic'}"> Toutes les annonces</a>
        </div>
        
    </div>
    
    <div id="blockRecherche">
        {formfull $RECHERCHERANNONCES, 'Projet_ITI~rechercherDesAnnonces@classic'}
    </div>
    
    <div id="blockPage">
        bloc page
        
        <nav id="navContacts">
        Contacts
        </nav>
  
        <div id="blockPrincipal">
            Annonce
            
            {foreach $AFFICHAGEANNONCE as $COURANTANNONCE}
                
            <li>titre: {$COURANTANNONCE->titre} </li>
            <li>Description: {$COURANTANNONCE->description}</li>
            <li>Photo: {$COURANTANNONCE->photo}</li>
            <li>Type d'annonce: {$COURANTANNONCE->type_annonce}</li>
            
            <li>Prix: {foreach $AFFICHAGEPRIXANNONCE as $COURANTPRIXANNONCE}
                               {$COURANTPRIXANNONCE->prix_vente} €
                      {/foreach}
            </li>
                <br><br>
            <a href="{jurl 'Projet_ITI~modifAnnonce@classic',array('id_annonce'=>$COURANTANNONCE->id_annonce) }">  >> Modifier les informations << </a>
        <br><br>
            <a href="{jurl 'Projet_ITI~modifAnnoncePrix@classic',array('id_vente'=>$COURANTPRIXANNONCE->id_vente) }">  >> Modifier le prix << </a>
            {/foreach}
                
                <br><br>
                <a class="suppr" id="liensuppr" href="{jurl 'Projet_ITI~deleteAnnonce@classic', array('id_annonce'=>$COURANTANNONCE->id_annonce) }" onclick="return confirmerDeleteAnnonce()">
                      >> Supprimer <<
                       </a>

            
            
        </div>    
        
        <nav id="navMarge">
        (Marge)
        </nav>
        
    </div>
    
</body>