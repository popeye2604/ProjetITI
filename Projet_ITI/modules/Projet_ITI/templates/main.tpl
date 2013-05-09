<body>
        
    <header id="headerAccueil">
            <h1 class="apptitle"> Titre 
            </h1>
    </header>
        
    <div class="blockcontent">
        <div id="dejaInscrit">                    
            <h1 class="apptitle">Déjà inscrit </h1>
            

                 
          
         {formfull $CONNEXIONUSERFORM, 'Projet_ITI~connexion@classic'}   
         
        </div>
        
         <div id="formInscription">
         
           <header>
               <h1 class="apptitle">Formulaire de connexion</h1></header>
            {formfull $NEWUSERFORM, 'Projet_ITI~saveUser@classic'}

               
        </div> 
    </div>
    
    <div id="blockBas">
  
            
         
    </div>
    <footer id="footerAccueil">     Site web réalisé par    </footer>
</body>

