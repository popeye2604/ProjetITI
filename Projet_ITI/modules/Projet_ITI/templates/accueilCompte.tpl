<body>
    <header >
        
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
        
        <div id="divLogoIntegral">
            <img id="logoIntegral" src="../../../images/logo.png" alt="Integrale HEI">
        </div>
        <div id="divChoixCat">{formfull $RECHERCHERANNONCES, 'Projet_ITI~rechercherDesAnnonces@classic'}
        </div>
        <div id="infoHeader" >{$WELCOMEUSERCONNECTED}<br>
        <a id ="lienLogout" href="{jurl 'Projet_ITI~index@classic'}" onclick="return confirmerDeconnexion()"> Me déconnecter</a>
        </div>
    </div>
    
    <div id="blockPage">
        
        
        <nav id="navContacts">
            <img id="imgLiens" src="../../../images/liens.png" alt="Photo de liens " />
            
            <div id="divNav">
                <p> <h3>Contacter le BDE</h3>
                <a class="img" href="mailto:integrale@hei.fr">
                <img id="img1" src="../../../images/email.png" alt="Photo de email " />
        
                </a>
            </p>
   
            <p><a class="img" href="http://facebook.com/boulkiyheis2012">
                <img id="img2" src="../../../images/facebook.png" alt="Photo de facebook" />
                </a>
            </p>
            
            <p><h3>Service HEI</h3>
                <a class="img" href="https://services.hei.fr/SitePages/Accueil.aspx">
                <img id="img3" src="../../../images/hei.png" alt="Photo de hei" />
                </a>
            </p>
            </div>
            
   
        </nav>
  
        <div id="blockPrincipal">
            <h1 id="titreAccueilMonCompte" class="apptitle">
            Mon compte
            </h1>
            <div id="infosPersos">
                <h3 class="titreCompte">Informations personnelles</h3>
            <ul>
                <li> Nom: {$NOMUSERCONNECTED}
                </li>
                
                <li> Prenom: {$PRENOMUSERCONNECTED}
                </li>
                                
                <li> Date de naissance: {$DATEUSERCONNECTED}
                </li>
                                
                <li> Adresse: {$ADRESSUSERCONNECTED}
                </li><br/>
                <a href="{jurl 'Projet_ITI~modifCompte@classic' }">
                             >>  Modifier des informations  << </a> <br/>
            </ul><br/>
                
            </div>
            
            <div id="infosCompte">
                <h3 class="titreCompte">Informations du compte</h3>
                <ul>
                <li> Adresse email: {$EMAILUSERCONNECTED}
                </li>
                <br/>
                <a href="{jurl 'Projet_ITI~modifMdp@classic' }"> >>  Modification du mot de passe  << </a>
                </ul><br/>

            </div>
                                
            
            <div id="activiteCompte">
                <h3 class="titreCompte">Activité du compte</h3>     
                <h4 class= "titreCompte">Vos annonces:</h4>
            
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