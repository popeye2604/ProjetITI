<body><h1 class="apptitle">
    {$TITLE}
</h1>

          <audio src="musique/september.mp3" controls>
</audio>

<div id="blockintro" class="block">
        <h2>  Présentation </h2>
        
        <div class="blockcontent">
            <header>Bienvenue sur ma page d'accueil</header><br/>
            <article>Les tables demandées pour la réalisation du projet apparaissent dans  les 
            blocks ci dessous. Vous pouvez également accéder aux informations supplémentaires concernant le projet
            via l'onglet de navigation de droite.
            Enfin, vous pouvez me contacter par les moyens qui vous conviennent via l'onglet de navigation de gauche.</article></div>
</div>

<nav id="nav1">
    <br/><br/>
    

<h4>Si vous souhaitez me contacter:</h4>
 

    <p><a class="img" href="mailto:jeremy.martos@hei.fr">
        <img id="img1" src="images/email.png" alt="Photo de email " />
        
    </a></p>
   
   <p><a class="img" href="https://www.facebook.com/jeremy.martos.3?ref=tn_tnmn">
       <img id="img2" src="images/facebook.png" alt="Photo de facebook" />
   </a></p>
  
   <p><a class="img" href="https://twitter.com/sotram1"><img id="img3" src="images/twitter.png" alt="Photo de twitter" />
    </a> 
  </p>
  




</nav>


        
<nav id="nav2">
    <a href="../../../ProjetDevWeb/www/info_projet.php">Explications de la réalisation</a><br/><br/> 
   
    <a href="../../../ProjetDevWeb/www/info_projet.php#contraintes"> >> Contraintes</a><br/><br/>
       
        <a href="../../../ProjetDevWeb/www/info_projet.php#details"> >> Détails</a>
        

    
</nav>    
    <div id="block1" class="block">
        <h2>  Voici la liste des personnes qui ont commandé des articles : </h2>
        
        <div class="blockcontent">
            <ul>
                {foreach $ALLTIERS as $COURANTTIERS}
                    <li>  {$COURANTTIERS->TRS_NOM}  {$COURANTTIERS->TRS_PRENOM}  </li>
                    
                 {/foreach}
            </ul>
        
        </div>
        
    
    
    </div>
      
      
                <div id="block2" class="block">
        <h2>  Voici la liste de la table "ligne" : </h2>
        <div class="blockcontent">
            <ul>
                {foreach $ALLLIGNES as $COURANTLIGNES}
                    <li> 
                            
                            Quantité : {$COURANTLIGNES->LGN_QTE} // avec un total Hors Taxe de : {$COURANTLIGNES->LGN_TOTALHT} €      
                  
                            <a href="{jurl 'ProjetDevWeb~updateData@classic', array('LGN_ID'=>$COURANTLIGNES->LGN_ID) }">
                                Modifier</a> 
                                
                    <a class="suppr" id="liensuppr" href="{jurl 'ProjetDevWeb~deleteData@classic', array('LGN_ID'=>$COURANTLIGNES->LGN_ID) }" onclick="return confirmerDeleteData()">
                      Supprimer
                       </a>
                    </li>
                    
                 {/foreach}
            </ul>

        </div>
        
    
    
    </div>

            <footer>Projet réalisé par J.M.™</footer>
          
  </body> 
 