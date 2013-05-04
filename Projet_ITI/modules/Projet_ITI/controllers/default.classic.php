<?php
/**
* @package   Projet_ITI
* @subpackage Projet_ITI
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

class defaultCtrl extends jController {
    public $pluginParams = array(
    '*'=>array('auth.required'=>false),
    'accueilCompte'=>array('auth.required'=>true),
    'modifCompte'=>array('auth.required'=>true),
    'saveModifUtilisateur'=>array('auth.required'=>true),
    'modifMdp'=>array('auth.required'=>true),
    'saveModifMdp'=>array('auth.required'=>true),
    'afficherAnnonce'=>array('auth.required'=>true),
    'afficherToutesLesAnnonces'=>array('auth.required'=>true),
    'deposer'=>array('auth.required'=>true),

);

    function index() {
        jAuth::logout();
        
        $rep = $this->getResponse('html');
        
        $rep->bodyTpl="main";
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_accueil.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        //Création du formulaire à partir du .xml
        $inscriptionUserForm = jForms::create("Projet_ITI~inscriptionUser");
        
        //$inscriptionForm->initFromDao("Projet_ITI~utilisateur");
        $rep->body->assign('NEWUSERFORM', $inscriptionUserForm);
        
        //Création du formulaire à partir du .xml
        $connexionUserForm = jForms::create("Projet_ITI~connexionUser");
        
        //$inscriptionForm->initFromDao("Projet_ITI~utilisateur");
        $rep->body->assign('CONNEXIONUSERFORM', $connexionUserForm);
        

        return $rep;
        
    }
 
    function connexion() {
            
            $mail = $this->param('login');
            $mdp = $this->param('password');                  
            jAuth::login($mail,$mdp);

            
            if (jAuth::isConnected()) {
            echo "Connexion réussie";
            return $this->accueilCompte();
            }
            
            else{return $this->errorConnexion();}
 
    }
    
    
    function errorConnexion() {
    
        $rep = $this->getResponse('html');
        
        $rep->bodyTpl="erreurConnexion";
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_accueil.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        //Création du formulaire à partir du .xml
        $inscriptionUserForm = jForms::create("Projet_ITI~inscriptionUser");
        
        //$inscriptionForm->initFromDao("Projet_ITI~utilisateur");
        $rep->body->assign('NEWUSERFORM', $inscriptionUserForm);
        
        //Création du formulaire à partir du .xml
        $connexionUserForm = jForms::create("Projet_ITI~connexionUser");
        
        //$inscriptionForm->initFromDao("Projet_ITI~utilisateur");
        $rep->body->assign('CONNEXIONUSERFORM', $connexionUserForm);
        
        $rep->body->assign('ERRORUSERCONNEXION', 'La combinaison identifiant / mot de passe est incorrecte ! ');
        

        return $rep;
        
        
    }

    
    
    function saveUser(){
        
$rep = $this->getResponse('html');
        $rep->bodyTpl="main";
        
        /*Je créé un formulaire sur la base de ce qu'a renvoyé l'internaute*/
        $form =  jForms::fill("Projet_ITI~inscriptionUser", $this->param('id_utilisateur'));
        
        /*Je remplit l'objet formulaire avec les informations saisies par l'internaute*/
        $form->initFromRequest();
        
        /*On control si le formulaire respecte les contraintes*/
        
        if ($form->check())
        {
            /*On indique qu'on va vouloir créer une dao à partir du formulaire*/
            $result=$form->prepareDaoFromControls('Projet_ITI~utilisateur');
            
            /*On récupère la factory de la ligne modifiée*/
            $utilisateurFactory=$result['dao'];
            
            /*On récupère la ligne issue du formulaire*/
            $courantUtilisateur=$result['daorec'];
            
            /*On met à jour la ligne récupérée dans le formulaire*/
            $utilisateurFactory->insert($courantUtilisateur);
        }
        
        return $this->index();    
    }
         



    function errorNewUser() {
        $rep = $this->getResponse('html');
        
        $rep->bodyTpl="erreurNewUser";
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_accueil.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        //Création du formulaire à partir du .xml
        $inscriptionUserForm = jForms::create("Projet_ITI~inscriptionUser");
        
        //$inscriptionForm->initFromDao("Projet_ITI~utilisateur");
        $rep->body->assign('NEWUSERFORM', $inscriptionUserForm);
        
        //Création du formulaire à partir du .xml
        $connexionUserForm = jForms::create("Projet_ITI~connexionUser");
        
        //$inscriptionForm->initFromDao("Projet_ITI~utilisateur");
        $rep->body->assign('CONNEXIONUSERFORM', $connexionUserForm);
        
        $rep->body->assign('ERRORNEWUSER', 'Veuillez remplir tous les champs du formulaire ! ');
        
        return $rep;
}
    
    
    function accueilCompte(){
        
        $rep = $this->getResponse('html'); 
        $rep->bodyTpl="accueilCompte";
        
        $user = jAuth::getUserSession();
        $idUserConnected=$user->id_utilisateur;
        
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        //Importation CSS jQuery
        $rep->addCssLink('http://code.jquery.com/ui/1.10.2/themes/base/jquery-ui.css');

        //Appel de jQuery depuis serveur Google
        $rep->addJSLink('https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js');

        //Appel de jQuery UI depuis serveur Google
        $rep->addJSLink('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
        
                /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        $rep->body->assign('WELCOMEUSERCONNECTED', 'Bonjour '. $user->prenom . ' ' . $user->nom);
        $rep->body->assign('NOMUSERCONNECTED',$user->nom);
        $rep->body->assign('PRENOMUSERCONNECTED',$user->prenom);
        $rep->body->assign('DATEUSERCONNECTED',$user->date_naissance);
        $rep->body->assign('ADRESSUSERCONNECTED',$user->num_voie. ' ' .$user->nom_voie. ' ' .$user->code_postal.' '.$user->ville);
        $rep->body->assign('EMAILUSERCONNECTED',$user->login);

        /*Je charge la factory des ventes*/
        $venteFactory =  jDao::get("vente"); 

        
        //Je créé une condition pour ne garder que les annonces de l'utilisateur en session
        $conditions = jDao::createConditions();
        $conditions->addCondition('id_utilisateur','=',$idUserConnected);
        $listVentes = $venteFactory->findBy($conditions);
        
        $listAllVentes=$venteFactory->findAll();
        
        $rep->body->assign('ALLVENTES', $listVentes);
        $rep->body->assign('ALLVENTES2', $listAllVentes);
        $rep->body->assign('USERCONNECTED', $idUserConnected);
        
        return $rep;
    }
    
    
    function modifCompte(){
     
        $rep = $this->getResponse('html');
        $rep->bodyTpl="modificationCompte";
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_accueil.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        
       
        $user = jAuth::getUserSession();
       /*Je récupère l'utilisateur passé en paramètre*/
        $paramUserId= $user->id_utilisateur;
        
        /*Je créé un formulaire à partir de la structure modificationCompte.form.xml*/
        $form= jForms::create("Projet_ITI~modificationCompte",$paramUserId);
        
        /*J'initialise le formulaire à partir de la DAO utilisateur
        (ce qui remplit automatiquement tous les champs du formulaire */
        $form->initFromDao("Projet_ITI~utilisateur");
        
        /*J'envoie le formulaire à la vue*/
        $rep->body->assign('FORMULAIREMODIFUTILISATEUR',$form);
        
       return $rep;
           
      
    }
    
    function saveModifUtilisateur() {
        
        $rep = $this->getResponse('html'); 
        $rep->bodyTpl="accueilCompte";
        
        /*Je créé un formulaire sur la base de ce qu'a renvoyé l'internaute*/
        $form =  jForms::fill("Projet_ITI~modificationCompte", $this->param('id_utilisateur'));
        
        /*Je remplit l'objet formulaire avec les informations saisies par l'internaute*/
        $form->initFromRequest();
        
        /*On control si le formulaire respecte les contraintes*/
        
        if ($form->check())
        {
            /*On indique qu'on va vouloir créer une dao à partir du formulaire*/
            $result=$form->prepareDaoFromControls('Projet_ITI~utilisateur');
            
            /*On récupère l'utilisateur issue du formulaire*/
            $courantUtilisateur=$result['daorec'];
            /*On met à jour l'utilisateur récupéré dans le formulaire*/
            jAuth::updateUser($courantUtilisateur);

        }
        
        return $this->accueilCompte();    
    }
    
    function modifMdp(){
        
        $rep = $this->getResponse('html');
        $rep->bodyTpl="modificationPassword";
        
         /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_accueil.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        
        
        $user = jAuth::getUserSession();
       /*Je récupère l'utilisateur passé en paramètre*/
        $paramUserId= $user->id_utilisateur;
        
        /*Je créé un formulaire à partir de la structure modificationCompte.form.xml*/
        $form= jForms::create("Projet_ITI~modificationPassword",$paramUserId);
        
        /*J'initialise le formulaire à partir de la DAO utilisateur
        (ce qui remplit automatiquement tous les champs du formulaire */
        $form->initFromDao("Projet_ITI~utilisateur");
        
        /*J'envoie le formulaire à la vue*/
        $rep->body->assign('FORMULAIREMODIFPASSWORD',$form);
        
        return $rep;
           
       
    }
    
    function saveModifMdp() {
        $rep = $this->getResponse('html'); 
        $rep->bodyTpl="accueilCompte";
        
        /*Je récupère l'utilisateur passé en paramètre*/
        $user = jAuth::getUserSession();
        $paramUserId= $user->id_utilisateur;
        
        /*Je créé un formulaire sur la base de ce qu'a renvoyé l'internaute*/
        $form =  jForms::fill("Projet_ITI~modificationPassword",$paramUserId);
        
        /*Je remplit l'objet formulaire avec les informations saisies par l'internaute*/
        $form->initFromRequest();
        
        $mail = $this->param('login');
        $newMdp = $this->param('password'); 
        
        /*On met à jour l'utilisateur récupéré dans le formulaire*/
        jAuth::changePassword($mail,$newMdp);
        
        return $this->accueilCompte();
        
    }
   
    function afficherAnnonce() {
        
        $rep = $this->getResponse('html');
        $rep->bodyTpl="pageAnnonce";
        
        /*je reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
         /* Ajout du css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        
        /*Je charge la factory des ventes*/
        $venteFactory =  jDao::get("vente");
        /*Je charge la factory des annonces*/
        $annonceFactory =  jDao::get("annonce");
        
 
        // OK !
        //Je créé une condition pour ne garder que les annonces de l'utilisateur en session
        $user = jAuth::getUserSession();
        $idUserConnected=$user->id_utilisateur;
        $conditions1 = jDao::createConditions();
        $conditions1->addCondition('id_utilisateur','=',$idUserConnected);
        $listVentes = $venteFactory->findBy($conditions1);    
        
        /*Je récupère l'id_annonce passé en paramètre*/
        $paramIdAnnonce=  $this->param('id_annonce',1);
        
        // OK !
        //Je créé une condition pour n'afficher que l'annonce sélectionnée 
        $conditions2 = jDao::createConditions();
        $conditions2->addCondition('id_annonce','=',$paramIdAnnonce);
        $affichageAnnonce = $annonceFactory->findBy($conditions2); 
        $rep->body->assign('AFFICHAGEANNONCE', $affichageAnnonce);
        
        // OK !
        //je créé une condition pour n'avoir que le prix de l'annonce sélectionnée
        $conditions3 = jDao::createConditions();
        $conditions3->addCondition('id_annonce','=',$paramIdAnnonce);
        $affichagePrixAnnonce = $venteFactory->findBy($conditions3); 
        $rep->body->assign('AFFICHAGEPRIXANNONCE', $affichagePrixAnnonce);

        $rep->body->assign('ALLVENTES', $listVentes);        
        $rep->body->assign('USERCONNECTED', $idUserConnected);

        
        
        
       return $rep;
    }
    function afficherToutesLesAnnonces() {
        $rep = $this->getResponse('html'); 
        $rep->bodyTpl="AfficherAnnonces";
        $user = jAuth::getUserSession();    
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');

        
        
        /*Ajout du script */
        
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        
        //Importation CSS jQuery
        $rep->addCssLink('http://code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css');

        //Appel de jQuery depuis serveur Google
        $rep->addJSLink('https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');

        //Appel de jQuery UI depuis serveur Google
        $rep->addJSLink('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.3/jquery-ui.min.js');
        
        
        $rep->body->assign('WELCOMEUSERCONNECTED', 'Bonjour '. $user->prenom . ' ' . $user->nom);
        
        /*Je charge la factory des ventes et annonces*/
        $venteFactory =  jDao::get("vente"); 
        $annonceFactory =  jDao::get("annonce"); 
        
        $listVentes = $venteFactory->findAll();
        $listAnnonces= $annonceFactory->findAll();
        
        //on compte le nbre d'annonces dans la bdd
        $nbAnnonces=$annonceFactory->countAll();
        $rep->body->assign('NBANNONCES',$nbAnnonces);
        
        
        
        
        /*J'envoie tous les ventes et annonces sur la vue*/
        $rep->body->assign('ALLVENTES',$listVentes);
        $rep->body->assign('ALLANNONCES',$listAnnonces);
        
        
        return $rep;
        
    }
    function deposer() {
        $rep = $this->getResponse('html');
        
        $rep->bodyTpl="deposer_annonce";
        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED', 'Bonjour '. $user->prenom . ' ' . $user->nom);
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        
        //Création du formulaire à partir du .xml
        $DeposerAnnonceForm = jForms::create("Projet_ITI~deposer_annonce");
        
        $rep->body->assign('DEPOSER_ANNONCEFORM', $DeposerAnnonceForm);
        
        
        return $rep;
        
    }
}
