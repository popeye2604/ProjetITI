<body>
        
    <header id="headerAccueil">
            <h1 class="apptitle"> Bienvenue sur le site d'annonces d'HEI
            </h1>
    </header>
        
    <div class="blockcontent">
        <div id="dejaInscrit">                    
            <h1 class="apptitle">Déjà inscrit </h1>
            

                 
          
         {formfull $CONNEXIONUSERFORM, 'Projet_ITI~connexion@classic'}   
         <div id="logoIntegralHei">
         </div>
        </div>
        
         <div id="formInscription">
         
           <header>
               <h1 class="apptitle">Nouvel utilisateur</h1></header>
            {formfull $NEWUSERFORM, 'Projet_ITI~saveUser@classic'}
             <br><br>
             <h3>
             Votre inscription est réussie!<br>
             <<< Vous pouvez vous identifier <<< </h3>
               
        </div> 
    </div>
    
    <div id="blockBas">
  
            
         
    </div>
    <footer id="footerAccueil">     Site web réalisé par    </footer>
</body>