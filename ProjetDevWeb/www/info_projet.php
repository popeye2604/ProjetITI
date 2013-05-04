<html>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <body style="background-color: #EFF4F6;font-family: Verdana, Arial, Sans;
font-size: 0.8em;">
   
        
        
<h1 id="titreInfo" style="font-size: 1.7em;background-color: #002830;text-align: center;color: white;
margin: 32px auto 1em auto;padding: 0.5em;width: 600px;-moz-border-radius: 5px;-webkit-border-radius: 5px;
-o-border-radius: 5px;border-radius: 5px;z-index: 100;-moz-box-shadow: #999 3px 3px 8px 0px;
-webkit-box-shadow: #999 3px 3px 8px;-o-box-shadow: #999 3px 3px 8px 0px;
box-shadow: #999 3px 3px 8px 0px;">
    
    
    Explication concernant le projet
    
</h1>
        
        <nav style="position: absolute; padding: 10px 10px ;height: 100px;width:15%;text-align: center;
     vertical-align: middle;border-width: 5px;border-color: #002830;border-radius: 30px 30px; 
     border-style: solid;"> 
        
        <a href="index.php">    Retour page principale    </a>
        
        
        
        </nav>      

<div style="text-align: left;position: relative;width:60%;left:20%;right:20%;">
    
    
    <header id="contraintes" style="font-size: 1.5em; font-weight: bold;color: white;background: #3C90AF; vertical-align: bottom;margin: 0;padding: 10px 0px 5px 10px;
background-position: center left;background-repeat: no-repeat;
-moz-border-radius: 15px 15px 0px 0px;-o-border-radius: 15px 15px 0px 0px;-webkit-border-top-right-radius: 15px;
-webkit-border-top-left-radius: 15px;border-radius: 15px 15px 0px 0px;
-moz-box-shadow: #999 3px 3px 8px 0px;-webkit-box-shadow: #999 3px 3px 8px;
-o-box-shadow: #999 3px 3px 8px 0px;box-shadow: #999 3px 3px 8px 0px;z-index: 50;">
        
        En ce qui concerne les contraintes:
        
    </header>
    
    
    
    <article style="background: white;padding: 1em 2em;margin-bottom: 20px;-moz-box-shadow: #999 3px 3px 8px 0px;
-webkit-box-shadow: #999 3px 3px 8px;-o-box-shadow: #999 3px 3px 8px 0px;box-shadow: #999 3px 3px 8px 0px;
-moz-border-radius: 0px 0px 15px 15px;-webkit-border-bottom-left-radius: 15px;
-webkit-border-bottom-right-radius: 15px;-o-border-radius: 0px 0px 15px 15px;
border-radius: 0px 0px 15px 15px;">
        
       
        <ul>
            <li> La base de données est constituée de 4 tables (article, commande, lignes, tiers) modélisant des achats et pouvant être utilisées dans la gestion d'un magasin. 
                <p>
    En voici le modèle logique :<br /><br />
    
    <img src="images/BDD.png" alt="Photo de la BDD"  style="width:80%;"/>
</p>
                <br/>J'ai décidé d'afficher sur la page d'accueil les tables lignes et tiers.
                <br/>De plus, j'ai affiché les données  "nom" et "prénom" de la table "tiers" ainsi que "quantité" et "prix en HT" dela table "lignes". 
                <br/>Enfin, j'ai décidé de pouvoir éffectuer les modifications et/ou suppressions sur la table lignes.

            </li>
            
            
            <li> A propos des actions à créer (updateData() etc.) elles ont été réalisées dans leur totalité.  
            </li>
            
            
            <li>
                Concernant le CSS j'ai utilisé le fichier CSS de Jelix ainsi qu'un fichier personnel pour la mise en page etc.
            </li>
            
            <li> J'ai ajouté sur la page d'accueil un lien pour afficher les indications concernant la réalisation du projet.
            </li>
        </ul>
    
    </article>
</div>
        
        
        <div style="text-align: left;position: relative;width:60%;left:20%;right:20%;">
    
    
    <header id ="details" style="font-size: 1.5em; font-weight: bold; color: white;background: #3C90AF; vertical-align: bottom;margin: 0;padding: 10px 0px 5px 10px;
background-position: center left;background-repeat: no-repeat;
-moz-border-radius: 15px 15px 0px 0px;-o-border-radius: 15px 15px 0px 0px;-webkit-border-top-right-radius: 15px;
-webkit-border-top-left-radius: 15px;border-radius: 15px 15px 0px 0px;
-moz-box-shadow: #999 3px 3px 8px 0px;-webkit-box-shadow: #999 3px 3px 8px;
-o-box-shadow: #999 3px 3px 8px 0px;box-shadow: #999 3px 3px 8px 0px;z-index: 50;">
        
        Détails supplémentaires:
        
    </header>
    
    
    
    <article style="background: white;padding: 1em 2em;margin-bottom: 20px;-moz-box-shadow: #999 3px 3px 8px 0px;
-webkit-box-shadow: #999 3px 3px 8px;-o-box-shadow: #999 3px 3px 8px 0px;box-shadow: #999 3px 3px 8px 0px;
-moz-border-radius: 0px 0px 15px 15px;-webkit-border-bottom-left-radius: 15px;
-webkit-border-bottom-right-radius: 15px;-o-border-radius: 0px 0px 15px 15px;
border-radius: 0px 0px 15px 15px;">
        
       
        <ul>
            <li>
                Pour le sélecteur d'attribut concernant le lien "supprimer" de la page d'accueil je l'ai utilisé pour faire un jeu de couleur avec le rouge.
            </li>
            <li>
                J'ai ajouté un cadre de navigation sur le coté gauche pour permettre de me contacter via différents supports.
            </li>
            <li>
                J'ai également créé un cadre de navigation à droite permettant d'accéder à cette deuxième page.
                J'ai alors ajouté un lien direct vers la page ainsi que deux liens vers les ancres des paragraphes concernés.
            </li>
            <li>
                Sur ces deux cadres j'ai ajouté des transitions compatibles sur Mozilla Firefox, Google Chrome, 
            Safari et opéra.<br/>
            Il y a aussi des transitions sur chacunes des images, cependant la rotation ne fonctionne  pas sur Mozilla Firefox. En revanche elle fonctionne sous Chrome.
            </li>
            
            <li>
                De plus, j'ai créé un autre cadre en bas de la page principale sur lequel j'ai également ajouté une transition.
            </li>
            <li>
                J'ai également ajouté un lecteur audio avec une seule musique sur la première page avec la possibilité de controle sur le lecteur.
            </li>
            
            <li>
                Enfin, cette page d'explication est une page PHP où j'ai ajouté directement le code CSS à l'intérieur des balises pour des questions de simplicité. Cela m'a également éviter de perdre trop de temps.
                <br/> Pour le code CSS de cette page j'ai repris certaines propriétés propres à ma première page et d'autres au style de Jelix via FireBug. 
            </li>
        </ul>
    
    </article>
</div>
        
        
        <footer style="background-color: white;position:fixed;bottom: 0px;left: 0px;
text-align: center;vertical-align: middle;width: 100%;height:20px;
border-width: 2px;border-color: #002830;border-radius: 20px 20px; border-style: solid;">
            
            
            Projet réalisé par J.M.™
        </footer>
    </body>
    

