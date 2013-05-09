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
    
    <div class="blockcontent">
    
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
        
  <form action="{formurl 'Projet_ITI~saveAnnonce@classic'}" method="POST">
        <div id="blockPrincipalModifAnnonce">   
            <h1 id="titreFormModifAnnonce" class="apptitle">
    Modification de votre annonce
</h1>
{formfull $FORMULAIREMODIFANNONCE, 'Projet_ITI~saveModifAnnonce@classic'}
</div>
        
        
        <nav id="navMarge">
       
        </nav>
        
    </div>
    
</body>