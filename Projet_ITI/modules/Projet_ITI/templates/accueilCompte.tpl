<body>
    <header >
        {$WELCOMEUSERCONNECTED}
        <a id ="lienLogout" href="{jurl 'Projet_ITI~index@classic'}"> Me déconnecter</a>
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
        
        <input id="jUrlAjaxAutocomplete" type="hidden" value="{jUrl 'Projet_ITI~rechercheMot@classic'}">
        <label for="motCles"> Mots clés:</label>
        <input type="text" id="rechercheMotCles">
        <br>
        
        
        <select>
        <option value="0" selected="True">Toutes catégories</option>
        <option class="titreRechercheCategorie" value="1">-- VEHICULES --</option>
        <option value="6">Voitures</option>
        <option value="7">Motos</option>
        <option value="8">Equipements auto</option>
        <option value="9">Equipements moto</option>
        
        <option class="titreRechercheCategorie" value="2">-- IMMOBILIERS --</option>
        <option value="10">Ventes</option>
        <option value="11">Locations</option>
        <option value="12">Colocations</option>
        
        <option class="titreRechercheCategorie" value="3">-- MULTIMEDIA --</option>
        <option value="13">Informatique</option>
        <option value="14">Jeux Videos</option>
        <option value="15">Image & son</option>
        <option value="16">Téléphonie</option>
        
        <option class="titreRechercheCategorie" value="4">-- MAISON --</option>
        <option value="17">Ameublement</option>
        <option value="18">Electroménager</option>
        
        <option class="titreRechercheCategorie" value="5">-- SERVICES --</option>
        <option value="19">Stages</option>
        <option value="20">Services</option>
        <option value="21">Billeterie</option>
        
        </select>
        
        <input type="submit" value="Go !">
        
    </div>
    
    <div id="blockPage">
        bloc page
        
        <nav id="navContacts">
        Contacts
        </nav>
  
        <div id="blockPrincipal">
            Block Principal
            <div id="infosPersos">
                <h3>Informations personnelles</h3>
            <ul>
                <li> Nom: {$NOMUSERCONNECTED}
                </li>
                
                <li> Prenom: {$PRENOMUSERCONNECTED}
                </li>
                                
                <li> Date de naissance: {$DATEUSERCONNECTED}
                </li>
                                
                <li> Adresse: {$ADRESSUSERCONNECTED}
                </li>
                <a href="{jurl 'Projet_ITI~modifCompte@classic' }">
                             >>  Modifier des informations  << </a> 
            </ul>
                
            </div>
            
            <div id="infosCompte">
                <h3>Informations du compte</h3>
                <ul>
                <li> Adresse email: {$EMAILUSERCONNECTED}
                </li>
                <br/>
                <a href="{jurl 'Projet_ITI~modifMdp@classic' }"> >>  Modification du mot de passe  << </a>
                </ul>

            </div>
                                
            
            <div id="activiteCompte">
                <h3>Activité du compte</h3>     
                Vos annonces:
            
        <ul>

            {foreach $ALLVENTES as $COURANTVENTES}
                
            <li>
                <a href="{jurl 'Projet_ITI~afficherAnnonce@classic',array('id_annonce'=>$COURANTVENTES->id_annonce)}">
                               {$COURANTVENTES->titreAnnonce} </a>
                
            </li>
            
            {/foreach}

        </ul>
                
            </div>
            
            
        
        </div>
        
        <nav id="navMarge">
        (Marge)
        </nav>
        
    </div>
    
            
         <script type="text/javascript">
        var availableMotCles = [
        {foreach $ALLVENTES2 as $COURANTVENTES}
                "{$COURANTVENTES->titreAnnonce}",
        {/foreach}        
    ];
</script>    
            
</body>