<body>
        
    <header id="headerAccueil">
            <h1 class="apptitle"> Titre 
            </h1>
    </header>
        
    <div class="blockcontent">
        <div id="dejaInscrit">                    
            <h1 class="apptitle">Déjà inscrit </h1>
            

                 
          
         {formfull $CONNEXIONUSERFORM, 'Projet_ITI~connexion@classic'}   
         <p><img id="imgHEI" src="images/logo.png" alt="Icone HEI" /></p>
        </div>
        
         <div id="formInscription">
         
           <header>
               <h1 class="apptitle">Formulaire de connexion</h1></header>
            {formfull $NEWUSERFORM, 'Projet_ITI~saveUser@classic'}

               
        </div> 
    </div>
    
    <div id="blockBas">
       <p><a class="img" href="mailto:integrale@hei.fr">
                <img id="img1" src="images/email.png" alt="Photo de email " />
        
                </a>
            </p>
   
            <p><a class="img" href="http://facebook.com/boulkiyheis2012">
                <img id="img2" src="images/facebook.png" alt="Photo de facebook" />
                </a>
            </p>
  
            
         
    </div>
    <footer id="footerAccueil">     Site web réalisé par    </footer>
</body>

