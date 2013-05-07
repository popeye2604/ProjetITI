
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
  
        <div id="content">
            
            <div id="Pagination" class="pagination">
            </div>
            
            
            {foreach $ALLVENTES as $COURANTVENTES} 
            
               
   
            <div id="blockAllAnnonces">
                    <a href="{jurl 'Projet_ITI~afficherAnnonce@classic',array('id_annonce'=>$COURANTVENTES->id_annonce)}">
                               {$COURANTVENTES->titreAnnonce} </a><br/>
                    
                    <ul>
                        <li>
                            
                            Photo: {$COURANTVENTES->photoAnnonce}
                            
                        </li>
                    </ul>
                <div id="annonceDescPrix">
                    <ul>
                    
                        <li>
                            
                                Description: {$COURANTVENTES->descriptionAnnonce}
                                
                        </li>
                        <li>Prix: {$COURANTVENTES->prix_vente} €
                        </li>
                    </ul>
                </div>        

           </div>
                             
             
            {/foreach}
   
           
        </div>
        
        
        <nav id="navMarge">
            
        (Marge)
        </nav>
        
    </div>
    
</body>