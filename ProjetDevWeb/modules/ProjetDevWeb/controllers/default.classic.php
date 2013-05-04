<?php
/**
* @package   ProjetDevWeb
* @subpackage ProjetDevWeb
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

class defaultCtrl extends jController {
    /**
    *
    */
    function index() {
        $rep = $this->getResponse('html');
        
        $rep->bodyTpl="main";
        
        /*je reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
        /* Ajout du css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles.css');
              
        $rep->body->assign('TITLE','Projet de Jérémy Martos');
        
        /*Je charge la factory des tiers*/
        $tiersFactory =  jDao::get("tiers");
        
        /*Je récupère tous les tiers*/
        $listOfAllTiers=$tiersFactory->findAll();
        
        /*J'envoie tous les tiers sur le main*/
        $rep->body->assign('ALLTIERS',$listOfAllTiers);
     
        /*Je charge la factory des lignes*/
        $lignesFactory =  jDao::get("lignes");
        
        /*Je récupère tous les lignes*/
        $listOfAllLignes=$lignesFactory->findAll();
        
        /*J'envoie tous les articles sur le main*/
        $rep->body->assign('ALLLIGNES',$listOfAllLignes);
        
        
        /*Ajout du script */
        
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
               
        /*Ajout de jQuery*/
        
        $rep->addCssLink(jApp::config()->urlengine['jelixWWWPath'].'design/jelix.css');
        //Ajout du fichier css de jQuery
        $rep->addCssLink('http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css');
        
        //Appel de jQuery depuis Google
        $rep->addJSLink('https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
        
        //Appel de jQuery UI
        $rep->addJSLink('https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js');
        
        //
        $rep->addJSLink('js/mes_scripts.js');
        

        
        
        $dt = new jDateTime();
        $dt->now();
        $dt->defaultFormat = jDateTime::TIMESTAMP_FORMAT;
        echo "Nous sommes le ", $dt->day, "/", $dt->month, "/",$dt->year;

        return $rep;
    }

    
    
    function updateData(){
     
        $rep = $this->getResponse('html');
        $rep->bodyTpl="data";
        
        /*je reprend le thème CSS de jelix */
        $chemin=jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin. 'jelix.css');
        
         /* Ajout du css */
        $rep->addCSSLink(jApp::config()->urlengine['basePath'].'css/mes_styles.css');
        
        /*Je récupère l'ART_ID passé en paramètre*/
        $paramLgnId=  $this->param('LGN_ID',1);
        
        /*Je créé un formulaire à partir de la structure article.form.xml*/
        $form= jForms::create("ProjetDevWeb~lignes",$paramLgnId);
        
        /*J'initialise le formulaire à partir de la DAO article
        (ce qui remplit automatiquement tous les champs du formulaire */
        $form->initFromDao("ProjetDevWeb~lignes");
        
        /*J'envoie le formulaire à la vue*/
        $rep->body->assign('FORMULAIRE',$form);
        
       return $rep;
           
      
    }
    
    function saveLignes() {
        
        $rep = $this->getResponse('html');
        $rep->bodyTpl="main";
        
        /*Je créé un formulaire sur la base de ce qu'a renvoyé l'internaute*/
        $form =  jForms::fill("ProjetDevWeb~lignes", $this->param('LGN_ID'));
        
        /*Je remplit l'objet formulaire avec les informations saisies par l'internaute*/
        $form->initFromRequest();
        
        /*On control si le formulaire respecte les contraintes*/
        
        if ($form->check())
        {
            /*On indique qu'on va vouloir créer une dao à partir du formulaire*/
            $result=$form->prepareDaoFromControls('ProjetDevWeb~lignes');
            
            /*On récupère la factory de la ligne modifiée*/
            $lignesFactory=$result['dao'];
            
            /*On récupère la ligne issue du formulaire*/
            $courantLignes=$result['daorec'];
            
            /*On met à jour la ligne récupérée dans le formulaire*/
            $lignesFactory->update($courantLignes);
        }
        
        return $this->index();    
    }
    
    function deleteData() {
        $rep = $this->getResponse('html');
        $rep->bodyTpl="main";
        
        
        /*Je charge la factory des lignes*/
        $lignesFactory =  jDao::get("lignes");
        
        //je passe l'ID de ligne  en paramètres
        $LGN_ID=$this->param('LGN_ID');
        
        // Je supprime la ligne correspondant à l'ID séléctionné
        $lignesFactory->delete($LGN_ID);
        
        
         /*Ajout du script */
        
        $rep->addJSLink(jApp::config()->urlengine['basePath'].'js/mes_scripts.js');
        
         return $this->index();  
        
        
    }
} 
    