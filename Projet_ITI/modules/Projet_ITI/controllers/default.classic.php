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
            //récupération des login/password en paramètres
            $mail = $this->param('login');
            $mdp = $this->param('password');                  
            jAuth::login($mail,$mdp);

            //condition avec le jAuth pour vérifier la validité de la combinaison login/password
            if (jAuth::isConnected()) {
                
            
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
            
            //récupération des login/password en paramètres
            
            
            
            /*On met à jour la ligne récupérée dans le formulaire*/
            $utilisateurFactory->insert($courantUtilisateur);
            
            //$mail = $this->param('login');
            //$mdp = $this->param('password');
            //$nom = $this->param('nom');
            //$mailEnvoie = new jMailer();
            //$mailEnvoie->Subject = 'Identifiants du site Annonce HEI ';
            //$mailEnvoie->Body ='vos identifiants';
            //$mailEnvoie->AddAddress($mail, $nom);
            //$mailEnvoie->Send();
            
            
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
        
        //On passe l'id de l'utilisateur en session dans une variable
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
        
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
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
        
        //bloc de recherches
        //Création du formulaire à partir du .xml
        $rechercheAnnoncesForm = jForms::create("Projet_ITI~rechercherAnnonces");
        $rep->body->assign('RECHERCHERANNONCES', $rechercheAnnoncesForm);
        
        

        return $rep;
    }
    
    
    function modifCompte(){
     
        $rep = $this->getResponse('html');
        $rep->bodyTpl="modificationCompte";
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        
        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
        
       /*Je récupère l'utilisateur passé en paramètre*/
        $paramUserId= $user->id_utilisateur;
        
        /*Je créé un formulaire à partir de la structure modificationCompte.form.xml*/
        $form= jForms::create("Projet_ITI~modificationCompte",$paramUserId);
        
        /*J'initialise le formulaire à partir de la DAO utilisateur
        (ce qui remplit automatiquement tous les champs du formulaire */
        $form->initFromDao("Projet_ITI~utilisateur");
        
        /*J'envoie le formulaire à la vue*/
        $rep->body->assign('FORMULAIREMODIFUTILISATEUR',$form);
        
        //bloc de recherches
        //Création du formulaire à partir du .xml
        $rechercheAnnoncesForm = jForms::create("Projet_ITI~rechercherAnnonces");
        $rep->body->assign('RECHERCHERANNONCES', $rechercheAnnoncesForm);
        
       return $rep;
           
      
    }
    
    function saveModifUtilisateur() {
        
        $rep = $this->getResponse('html'); 
        $rep->bodyTpl="accueilCompte";
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
        
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
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
               
        
        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
       /*Je récupère l'utilisateur passé en paramètre*/
        $paramUserId= $user->id_utilisateur;
        
        /*Je créé un formulaire à partir de la structure modificationCompte.form.xml*/
        $form= jForms::create("Projet_ITI~modificationPassword",$paramUserId);
        
        /*J'initialise le formulaire à partir de la DAO utilisateur
        (ce qui remplit automatiquement tous les champs du formulaire */
        $form->initFromDao("Projet_ITI~utilisateur");
        
        /*J'envoie le formulaire à la vue*/
        $rep->body->assign('FORMULAIREMODIFPASSWORD',$form);
        
        //bloc de recherches
        //Création du formulaire à partir du .xml
        $rechercheAnnoncesForm = jForms::create("Projet_ITI~rechercherAnnonces");
        $rep->body->assign('RECHERCHERANNONCES', $rechercheAnnoncesForm);
        
        return $rep;
           
       
    }
    
    function saveModifMdp() {
        $rep = $this->getResponse('html'); 
        $rep->bodyTpl="accueilCompte";
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        /*Je récupère l'utilisateur passé en paramètre*/
        
        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
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
    
    function modifAnnonce() {

        $rep = $this->getResponse('html');
        $rep->bodyTpl="modificationAnnonce";
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
        
        /*Je récupère l'id_annonce passée en paramètre*/
        $paramIdAnnonce=  $this->param('id_annonce',1);
        
        /*Je créé un formulaire à partir de la structure modificationAnnonce.form.xml*/
        $form= jForms::create("Projet_ITI~modificationAnnonce",$paramIdAnnonce);
        
        /*J'initialise le formulaire à partir de la DAO annonce
        (ce qui remplit automatiquement tous les champs du formulaire */
        $form->initFromDao("Projet_ITI~annonce");
        
        /*J'envoie le formulaire à la vue*/
        $rep->body->assign('FORMULAIREMODIFANNONCE',$form);
        
        //bloc de recherches
        //Création du formulaire à partir du .xml
        $rechercheAnnoncesForm = jForms::create("Projet_ITI~rechercherAnnonces");
        $rep->body->assign('RECHERCHERANNONCES', $rechercheAnnoncesForm);
        
       return $rep;
        
    }
   
    function saveModifAnnonce() {
        $rep = $this->getResponse('html');
        $rep->bodyTpl="accueilCompte";
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
       
        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED',$user->prenom . ' ' . $user->nom);
        
        /*Je créé un formulaire sur la base de ce qu'a renvoyé l'internaute*/
        $form =  jForms::fill("Projet_ITI~modificationAnnonce", $this->param('id_annonce'));
        
        /*Je remplit l'objet formulaire avec les informations saisies par l'internaute*/
        $form->initFromRequest();
        
        /*On control si le formulaire respecte les contraintes*/
        
        if ($form->check())
        {
            /*On indique qu'on va vouloir créer une dao à partir du formulaire*/
            $result=$form->prepareDaoFromControls('Projet_ITI~annonce');
            
            /*On récupère la factory de l'annonce modifiée*/
            $annonceFactory=$result['dao'];
            
            /*On récupère l'annonce issue du formulaire*/
            $courantAnnonce=$result['daorec'];
            
            /*On met à jour l'annonce récupérée dans le formulaire*/
            $annonceFactory->update($courantAnnonce);
        }
        
        return $this->accueilCompte();

    }
    
    function modifAnnoncePrix() {

        $rep = $this->getResponse('html');
        $rep->bodyTpl="modificationAnnoncePrix";
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED',$user->prenom . ' ' . $user->nom);
        
        /*Je récupère l'id_annonce passée en paramètre*/
        $paramIdVente=  $this->param('id_vente',1);
        
        /*Je créé un formulaire à partir de la structure modificationAnnonce.form.xml*/
        $form= jForms::create("Projet_ITI~modificationAnnoncePrix",$paramIdVente);
        
        /*J'initialise le formulaire à partir de la DAO annonce
        (ce qui remplit automatiquement tous les champs du formulaire */
        $form->initFromDao("Projet_ITI~vente");
        
        /*J'envoie le formulaire à la vue*/
        $rep->body->assign('FORMULAIREMODIFANNONCEPRIX',$form);
        
        //bloc de recherches
        //Création du formulaire à partir du .xml
        $rechercheAnnoncesForm = jForms::create("Projet_ITI~rechercherAnnonces");
        $rep->body->assign('RECHERCHERANNONCES', $rechercheAnnoncesForm);
        
       return $rep;
        
    }
    
    function saveModifAnnoncePrix() {
        
        $rep = $this->getResponse('html');
        $rep->bodyTpl="accueilCompte";
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
        
        /*Je créé un formulaire sur la base de ce qu'a renvoyé l'internaute*/
        $form =  jForms::fill("Projet_ITI~modificationAnnoncePrix", $this->param('id_vente'));
        
        /*Je remplit l'objet formulaire avec les informations saisies par l'internaute*/
        $form->initFromRequest();
        
        /*On control si le formulaire respecte les contraintes*/
        
        if ($form->check())
        {
            /*On indique qu'on va vouloir créer une dao à partir du formulaire*/
            $result=$form->prepareDaoFromControls('Projet_ITI~vente');
            
            /*On récupère la factory de la vente modifiée*/
            $venteFactory=$result['dao'];
            
            /*On récupère la vente issue du formulaire*/
            $courantVente=$result['daorec'];
            
            /*On met à jour la vente récupérée dans le formulaire*/
            $venteFactory->update($courantVente);
        }
        
        return $this->accueilCompte();
    }
    
    
    function deleteAnnonce() {
        $rep = $this->getResponse('html');
        $rep->bodyTpl="afficherAnnonce";

        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
        
        
        //je passe l'ID de ligne  en paramètres
        $paramIdAnnonce=$this->param('id_annonce');
        /*Je charge la factory des annonces et ventes*/
        $annonceFactory =  jDao::get("annonce");

        // Je supprime la ligne correspondant à l'ID séléctionné
        $annonceFactory->delete($paramIdAnnonce);
        

         /*Ajout du script */
        
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        //bloc de recherches
        //Création du formulaire à partir du .xml
        $rechercheAnnoncesForm = jForms::create("Projet_ITI~rechercherAnnonces");
        $rep->body->assign('RECHERCHERANNONCES', $rechercheAnnoncesForm);
        
         return $this->accueilCompte();  
        
        
    }
    
    function rechercherDesAnnonces(){
        $rep = $this->getResponse('html');
        $rep->bodyTpl="accueilCompte";
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');

        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
        

        //bloc de recherches
        //Création du formulaire à partir du .xml
        $rechercheAnnoncesForm = jForms::create("Projet_ITI~rechercherAnnonces");
        $rep->body->assign('RECHERCHERANNONCES', $rechercheAnnoncesForm);
        
        return $this->afficherAnnonceRecherchees();
        
        
    }
    
    
    
    function afficherAnnonce() {
        
        $rep = $this->getResponse('html');
        $rep->bodyTpl="pageAnnonce";
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        
        /*Je charge la factory des ventes*/
        $venteFactory =  jDao::get("vente");
        /*Je charge la factory des annonces*/
        $annonceFactory =  jDao::get("annonce");
        
        
        // OK !
        //Je créé une condition pour ne garder que les annonces de l'utilisateur en session
        $user = jAuth::getUserSession();
        $idUserConnected=$user->id_utilisateur;
        $rep->body->assign('USERCONNECTED', $idUserConnected);
        
        $conditions1 = jDao::createConditions();
        $conditions1->addCondition('id_utilisateur','=',$idUserConnected);
        $listVentes = $venteFactory->findBy($conditions1);    
        $rep->body->assign('ALLVENTES', $listVentes);  
        
        /*Je récupère l'id_annonce passé en paramètre*/
        $paramIdAnnonce=  $this->param('id_annonce',1);
        
        // OK !
        //Je créé une condition pour n'afficher que l'annonce sélectionnée 
        $conditions2 = jDao::createConditions();
        $conditions2->addCondition('id_annonce','=',$paramIdAnnonce);
        $affichageAnnonce = $annonceFactory->findBy($conditions2); 
        $rep->body->assign('AFFICHAGEANNONCE', $affichageAnnonce);
        
        // OK !
        //je créé une condition pour n'avoir que le prix de l'annonce sélectionnée, et le mail du déposeur
        $conditions3 = jDao::createConditions();
        $conditions3->addCondition('id_annonce','=',$paramIdAnnonce);
        $affichagePrixAnnonce = $venteFactory->findBy($conditions3); 
        $rep->body->assign('AFFICHAGEPRIXANNONCE', $affichagePrixAnnonce);
 
        

        //bloc de recherches
        //Création du formulaire à partir du .xml
        $rechercheAnnoncesForm = jForms::create("Projet_ITI~rechercherAnnonces");
        $rep->body->assign('RECHERCHERANNONCES', $rechercheAnnoncesForm);
        
        
        $rep->body->assign('WELCOMEUSERCONNECTED',$user->prenom . ' ' . $user->nom);
        
       return $rep;
    }
    function afficherAnnonce2() {
        
        $rep = $this->getResponse('html');
        $rep->bodyTpl="pageAnnonce2";
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        
        /*Je charge la factory des ventes*/
        $venteFactory =  jDao::get("vente");
        /*Je charge la factory des annonces*/
        $annonceFactory =  jDao::get("annonce");
        
        
        // OK !
        //Je créé une condition pour ne garder que les annonces de l'utilisateur en session
        $user = jAuth::getUserSession();
        $idUserConnected=$user->id_utilisateur;
        $rep->body->assign('USERCONNECTED', $idUserConnected);
        
        $conditions1 = jDao::createConditions();
        $conditions1->addCondition('id_utilisateur','=',$idUserConnected);
        $listVentes = $venteFactory->findBy($conditions1);    
        $rep->body->assign('ALLVENTES', $listVentes);  
        
        /*Je récupère l'id_annonce passé en paramètre*/
        $paramIdAnnonce=  $this->param('id_annonce',1);
        
        // OK !
        //Je créé une condition pour n'afficher que l'annonce sélectionnée 
        $conditions2 = jDao::createConditions();
        $conditions2->addCondition('id_annonce','=',$paramIdAnnonce);
        $affichageAnnonce = $annonceFactory->findBy($conditions2); 
        $rep->body->assign('AFFICHAGEANNONCE', $affichageAnnonce);
        
        // OK !
        //je créé une condition pour n'avoir que le prix de l'annonce sélectionnée, et le mail du déposeur
        $conditions3 = jDao::createConditions();
        $conditions3->addCondition('id_annonce','=',$paramIdAnnonce);
        $affichagePrixAnnonce = $venteFactory->findBy($conditions3); 
        $rep->body->assign('AFFICHAGEPRIXANNONCE', $affichagePrixAnnonce);
 
        

        //bloc de recherches
        //Création du formulaire à partir du .xml
        $rechercheAnnoncesForm = jForms::create("Projet_ITI~rechercherAnnonces");
        $rep->body->assign('RECHERCHERANNONCES', $rechercheAnnoncesForm);
        
        
        $rep->body->assign('WELCOMEUSERCONNECTED',$user->prenom . ' ' . $user->nom);
        
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
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');/*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        
        //Importation CSS jQuery
        $rep->addCssLink('http://code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css');

        //Appel de jQuery depuis serveur Google
        $rep->addJSLink('https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');

        //Appel de jQuery UI depuis serveur Google
        $rep->addJSLink('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.3/jquery-ui.min.js');
        
        
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
        
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
        
        //bloc de recherches
        //Création du formulaire à partir du .xml
        $rechercheAnnoncesForm = jForms::create("Projet_ITI~rechercherAnnonces");
        $rep->body->assign('RECHERCHERANNONCES', $rechercheAnnoncesForm);
        
        return $rep;
        
    }
    
    function afficherAnnonceRecherchees() {
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

        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
        
        /*Je charge la factory des ventes et annonces*/
        $venteFactory =  jDao::get("vente"); 

      
        $valeurRecherche = $this->param('type');
        
        if($valeurRecherche==1) { $var1=6; $var2=7; $var3=8; $var4=9;
            
        }
        else {
            if($valeurRecherche==2) { $var1=10; $var2=11; $var3=12; $var4=$var3;}
            else {
                if($valeurRecherche==3) {$var1=13; $var2=14; $var3=15; $var4=16;}
                else {
                    if($valeurRecherche==4) {$var1=17; $var2=18; $var3=$var2; $var4=$var2;}
                    else {
                        if($valeurRecherche==5) {$var1=19; $var2=20; $var3=21; $var4=$var3;}
                        else {$var1=$valeurRecherche; $var2=$valeurRecherche; $var3=$valeurRecherche; $var4=$valeurRecherche;}
                    }
                    
                    ;}
                
                 }   
 
        }
        
        //Je créé une condition pour ne garder que les annonces de l'utilisateur en session
        $conditions = jDao::createConditions();
        $conditions->startGroup('OR');
        $conditions->addCondition('id_categorie','=',$var1);
        $conditions->addCondition('id_categorie','=',$var2);
        $conditions->addCondition('id_categorie','=',$var3);
        $conditions->addCondition('id_categorie','=',$var4);
        $conditions->endGroup();
        $listVentes = $venteFactory->findBy($conditions);

        $rep->body->assign('ALLVENTES', $listVentes);
 
        //bloc de recherches
        //Création du formulaire à partir du .xml
        $rechercheAnnoncesForm = jForms::create("Projet_ITI~rechercherAnnonces");
        $rep->body->assign('RECHERCHERANNONCES', $rechercheAnnoncesForm);
        
        return $rep;
        
    }
    
    function deposer() {
        $rep = $this->getResponse('html');
        
        $rep->bodyTpl="deposer_annonce";
        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
        
        /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
        
        //Création du formulaire à partir du .xml
        $DeposerAnnonceForm = jForms::create("Projet_ITI~deposer_annonce");
        $rep->body->assign('DEPOSER_ANNONCEFORM', $DeposerAnnonceForm);
        
        //bloc de recherches
        //Création du formulaire à partir du .xml
        $rechercheAnnoncesForm = jForms::create("Projet_ITI~rechercherAnnonces");
        $rep->body->assign('RECHERCHERANNONCES', $rechercheAnnoncesForm);
        
        
        return $rep;
        
    }
    
    function saveAnnonce(){
   
    $rep = $this->getResponse('html');
    $rep->bodyTpl="deposer_annonce";
    /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');

        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
        
        
        $annonceForm = jForms::get("Projet_ITI~deposer_annonce");
        $annonceForm ->initFromRequest();
    
    
    if($annonceForm->check()){
        /*On indique qu'on va vouloir créer une dao à partir du formulaire*/
        $result = $annonceForm->prepareDaoFromControls('Projet_ITI~annonce');
        $annonceFactory = $result['dao'];
        $courantAnnonce = $result['daorec'];

        
        $annonceForm->saveFile('photo', jApp::wwwPath('images/photos/'));
        $annonceForm->saveAllFiles();
        
        //on a créer la nouvelle annonce dans annonce
        $annonceFactory->insert($courantAnnonce);

        return $this->saveVente();   
    }
    
    else{
        
        return $this->deposer();
        
    
    }
}

    function saveVente(){
    $rep = $this->getResponse('html');
    $rep->bodyTpl="deposer_annonce";
    /*On reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* On ajoute le css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles_compte.css');
        
        /*On ajoute le script */
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
        $user = jAuth::getUserSession();
        $rep->body->assign('WELCOMEUSERCONNECTED', $user->prenom . ' ' . $user->nom);
    
        //on récupère l'id annonce créée précédemment
        $annonceForm = jForms::get("Projet_ITI~deposer_annonce");
        $annonceForm ->initFromRequest();
        $result = $annonceForm->prepareDaoFromControls('Projet_ITI~vente');
        $venteFactory = $result['dao'];
        $courantVente= $result['daorec'];
        
        //on a créé la nouvelle annonce dans la table vente
        $venteFactory->insert($courantVente);
        
        //on récupère l'id utilisateur créateur de l'annonce
         $idUserQuiDepose=$user->id_utilisateur;
         
         
         //on récupère l'id catégorie choisit par l'utilisateur
        $idCategorieRecup = $this->param('type');
        
        
        //on récupère l'id annonce créée en dernier
        $annonceFactory =  jDao::get("annonce");
        
            // Appel de la méthode XML avec ses arguments et récupération des données
        
            $record = $annonceFactory->getFewRecord();;


        // on modifie le record récupéré 
$courantVente->id_utilisateur= $idUserQuiDepose;
$courantVente->id_categorie= $idCategorieRecup;
$courantVente->id_annonce=$record->id_annonce;

// on le sauvegarde dans la base
$venteFactory->update($courantVente);
 
        return $this->accueilCompte();
    
}


}

