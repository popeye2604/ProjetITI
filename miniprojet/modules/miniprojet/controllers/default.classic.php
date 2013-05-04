<?php

/**
 * @package miniprojet
 * @subpackage miniprojet
 * @author your name
 * @copyright 2011 your name
 * @link http://www.yourwebsite.undefined
 * @license All rights reserved
 */
class defaultCtrl extends jController {

    /**
     *
     */
    function index() {
        $rep = $this->getResponse('html');
        $rep->title = "Comptes";


        $rep->bodyTpl = "main";
        $chemin = jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin . 'jelix.css');
        $repWWW = jApp::config()->urlengine['basePath'];
        $rep->addJSLink($repWWW . 'js/mes_scripts.js');
        $rep->addCSSLink($repWWW . 'css/mes_styles.css');
        $rep->addLink($repWWW . 'favicon/favicon.ico', 'icon',"image/x-icon"); 
        $rep->addHeadContent('<meta name="viewport" content="width=device-width, user-scalable=yes" />'); //doc jelix+lehollandaisvollant.net
//Affichage liste des transactions
        $transactionfactory = jDao::get("transaction");

        $listOfAllTransaction = $transactionfactory->findAll();

        $rep->body->assign('ALLTRANSACTION', $listOfAllTransaction);

        //Affichage tu total (j'ai pas trouvé comment faire une somme via une methode de la dao donc j'ai fait comme ça. 
        $totalTransaction = 0;
        foreach ($listOfAllTransaction as $value) {
            $totalTransaction += $value->montant;
        }
        $rep->body->assign('TOTALTRANSACTION', $totalTransaction);



//Affichage liste des dettes


        $dettefactory = jDao::get("dette");

        $listOfAllDette = $dettefactory->findAll();

        $rep->body->assign('ALLDETTE', $listOfAllDette);
        //Affichage tu total (j'ai pas trouvé comment faire une somme via une methode de la dao donc j'ai fait comme ça. 
        $totalDette = 0;
        foreach ($listOfAllDette as $value) {
            $totalDette += $value->montantDette;
        }
        $rep->body->assign('TOTALDETTE', $totalDette);

        return $rep;
    }

    function vueType() {
        $rep = $this->getResponse('html');
        $rep->title = "Types";
        $rep->bodyTpl = "vueType";
        $chemin = jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin . 'jelix.css');
        $repWWW = jApp::config()->urlengine['basePath'];
        $rep->addJSLink($repWWW . 'js/mes_scripts.js');
        $rep->addCSSLink($repWWW . 'css/mes_styles.css');
        $rep->addLink($repWWW . 'favicon/favicon.ico', 'icon'); //Ajoute une favicon au site l'aide p60 ne m'a pas du tout aidée
        //Affichage liste des types
        $typefactory = jDao::get("type");

        $listOfAllType = $typefactory->findAll();

        $rep->body->assign('ALLTYPE', $listOfAllType);

        return $rep;
    }

    function saveType() {
        if ($this->param('idType') == '') {
            $typeForm = jForms::fill("miniprojet~type");
            $typeForm->saveToDao("miniprojet~type");
        } else {
            $typeForm = jForms::fill("miniprojet~type", $this->param('idType'));
            $typeForm->initFromRequest();

            if ($typeForm->check()) {
                $result = $typeForm->prepareDaoFromControls('miniprojet~type');
                $typeFactory = $result['dao'];
                $courantType = $result['daorec'];

                $typeFactory->update($courantType);
            }
        }
        return $this->vueType();
    }

    function updateType() {
        $rep = $this->getResponse('html');
        $rep->title = "Modification d'un type";

        // this is a call for the 'welcome' zone after creating a new application
        // remove this line !
        $rep->bodyTpl = "data";
        $chemin = jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin . 'jelix.css');
        $repWWW = jApp::config()->urlengine['basePath'];
        $rep->addJSLink($repWWW . 'js/mes_scripts.js');
        //$rep->addCSSLink($repWWW . 'css/mes_styles.css');
        $rep->addLink($repWWW . 'favicon/favicon.ico', 'icon'); //Ajoute une favicon au site l'aide p60 ne m'a pas du tout aidée
        //Formulaire ajout type
        $paramIdType = $this->param('idType', 2);
        $typeForm = jForms::create("miniprojet~type", $paramIdType);
        $typeForm->initFromDao("miniprojet~type");

        $rep->body->assign('FORMULAIRE', $typeForm);
        $rep->body->assign('TITRE', 'Modifier un type');
        $rep->body->assign('SELECTEUR', 'miniprojet~saveType@classic');
        return $rep;
    }

    function createType() {
        $rep = $this->getResponse('html');
        $rep->title = "Ajout d'un type";


        $rep->bodyTpl = "data";
        $chemin = jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin . 'jelix.css');
        $repWWW = jApp::config()->urlengine['basePath'];
        $rep->addJSLink($repWWW . 'js/mes_scripts.js');
        //$rep->addCSSLink($repWWW . 'css/mes_styles.css');
        $rep->addLink($repWWW . 'favicon/favicon.ico', 'icon'); //Ajoute une favicon au site l'aide p60 ne m'a pas du tout aidée
        //Formulaire ajout type
        $typeForm = jForms::create("miniprojet~type");
        $rep->body->assign('FORMULAIRE', $typeForm);
        $rep->body->assign('TITRE', 'Ajouter un type');
        $rep->body->assign('SELECTEUR', 'miniprojet~saveType@classic');
        return $rep;
    }

    function deleteType() {

        // instanciation de la factory
        $typeFactory = jDao::get("miniprojet~type");
        // destruction du record 
        $typeFactory->delete($this->param('idType'));

        return $this->vueType();
    }

    function vueAmi() {
        $rep = $this->getResponse('html');
        $rep->title = "Amis";
        $rep->bodyTpl = "vueAmi";
        $chemin = jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin . 'jelix.css');
        $repWWW = jApp::config()->urlengine['basePath'];
        $rep->addJSLink($repWWW . 'js/mes_scripts.js');
        $rep->addCSSLink($repWWW . 'css/mes_styles.css');
        $rep->addLink($repWWW . 'favicon/favicon.ico', 'icon'); //Ajoute une favicon au site l'aide p60 ne m'a pas du tout aidée
        //Affichage liste des amis
        $amifactory = jDao::get("ami");

        $listOfAllAmi = $amifactory->findAll();

        $rep->body->assign('ALLAMI', $listOfAllAmi);

        return $rep;
    }

    function saveAmi() {
        if ($this->param('idAmi') == '') {
            $amiForm = jForms::fill("miniprojet~ami");
            $amiForm->saveToDao("miniprojet~ami");
        } else {
            $amiForm = jForms::fill("miniprojet~ami", $this->param('idAmi'));
            $amiForm->initFromRequest();

            if ($amiForm->check()) {
                $result = $amiForm->prepareDaoFromControls('miniprojet~ami');
                $amiFactory = $result['dao'];
                $courantAmi = $result['daorec'];

                $amiFactory->update($courantAmi);
            }
        }
        return $this->vueAmi();
    }

    function updateAmi() {
        $rep = $this->getResponse('html');
        $rep->title = "Ami modification";

        // this is a call for the 'welcome' zone after creating a new application
        // remove this line !
        $rep->bodyTpl = "data";
        $chemin = jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin . 'jelix.css');
        $repWWW = jApp::config()->urlengine['basePath'];
        $rep->addJSLink($repWWW . 'js/mes_scripts.js');
        //$rep->addCSSLink($repWWW . 'css/mes_styles.css');
        $rep->addLink($repWWW . 'favicon/favicon.ico', 'icon'); //Ajoute une favicon au site l'aide p60 ne m'a pas du tout aidée
        //Formulaire ajout ami
        $paramIdAmi = $this->param('idAmi', 2);
        $amiForm = jForms::create("miniprojet~ami", $paramIdAmi);
        $amiForm->initFromDao("miniprojet~ami");

        $rep->body->assign('FORMULAIRE', $amiForm);
        $rep->body->assign('TITRE', 'Modifier un ami');
        $rep->body->assign('SELECTEUR', 'miniprojet~saveAmi@classic');
        return $rep;
    }

    function createAmi() {
        $rep = $this->getResponse('html');
        $rep->title = "Ami création";


        $rep->bodyTpl = "data";
        $chemin = jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin . 'jelix.css');
        $repWWW = jApp::config()->urlengine['basePath'];
        $rep->addJSLink($repWWW . 'js/mes_scripts.js');
        //$rep->addCSSLink($repWWW . 'css/mes_styles.css');
        $rep->addLink($repWWW . 'favicon/favicon.ico', 'icon'); //Ajoute une favicon au site l'aide p60 ne m'a pas du tout aidée
        //Formulaire ajout ami
        $amiForm = jForms::create("miniprojet~ami");
        $rep->body->assign('FORMULAIRE', $amiForm);
        $rep->body->assign('TITRE', 'Ajouter un ami');
        $rep->body->assign('SELECTEUR', 'miniprojet~saveAmi@classic');
        return $rep;
    }

    function deleteAmi() {

        // instanciation de la factory
        $amiFactory = jDao::get("miniprojet~ami");
        // destruction du record 
        $amiFactory->delete($this->param('idAmi'));

        return $this->vueAmi();
    }

    function saveTransaction() {
        if ($this->param('idTransaction') == '') {
            $transactionForm = jForms::fill("miniprojet~transaction");
            $transactionForm->saveToDao("miniprojet~transaction");
        } else {
            $transactionForm = jForms::fill("miniprojet~transaction", $this->param('idTransaction'));
            $transactionForm->initFromRequest();

            if ($transactionForm->check()) {
                $result = $transactionForm->prepareDaoFromControls('miniprojet~transaction');
                $transactionFactory = $result['dao'];
                $courantTransaction = $result['daorec'];

                $transactionFactory->update($courantTransaction);
            }
        }
        return $this->index();
    }

    function updateTransaction() {
        $rep = $this->getResponse('html');
        $rep->title = "Modification de transaction";

        // this is a call for the 'welcome' zone after creating a new application
        // remove this line !
        $rep->bodyTpl = "data";
        $chemin = jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin . 'jelix.css');
        $repWWW = jApp::config()->urlengine['basePath'];
        $rep->addJSLink($repWWW . 'js/mes_scripts.js');
        //$rep->addCSSLink($repWWW . 'css/mes_styles.css');
        $rep->addLink($repWWW . 'favicon/favicon.ico', 'icon'); //Ajoute une favicon au site l'aide p60 ne m'a pas du tout aidée
        //Formulaire ajout transaction
        $paramIdTransaction = $this->param('idTransaction', 2);
        $transactionForm = jForms::create("miniprojet~transaction", $paramIdTransaction);
        $transactionForm->initFromDao("miniprojet~transaction");
        $rep->body->assign('TITRE', 'Modifier une transaction');
        $rep->body->assign('FORMULAIRE', $transactionForm);
        $rep->body->assign('SELECTEUR', 'miniprojet~saveTransaction@classic');


        return $rep;
    }

    function createTransaction() {
        $rep = $this->getResponse('html');
        $rep->title = "Money création";

        // this is a call for the 'welcome' zone after creating a new application
        // remove this line !
        $rep->bodyTpl = "data";
        $chemin = jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin . 'jelix.css');
        $repWWW = jApp::config()->urlengine['basePath'];
        $rep->addJSLink($repWWW . 'js/mes_scripts.js');
        //$rep->addCSSLink($repWWW . 'css/mes_styles.css');
        $rep->addLink($repWWW . 'favicon/favicon.ico', 'icon'); //Ajoute une favicon au site l'aide p60 ne m'a pas du tout aidée
        //Formulaire ajout transaction
        $transactionForm = jForms::create("miniprojet~transaction");
        $rep->body->assign('FORMULAIRE', $transactionForm);
        $rep->body->assign('TITRE', 'Ajouter une transaction');
        $rep->body->assign('SELECTEUR', 'miniprojet~saveTransaction@classic');
        return $rep;
    }

    function deleteTransaction() {

        // instanciation de la factory
        $transactionFactory = jDao::get("miniprojet~transaction");
        // destruction du record 
        $transactionFactory->delete($this->param('idTransaction'));

        return $this->index();
    }

    function saveDette() {
        if ($this->param('idDette') == '') {
            $detteForm = jForms::fill("miniprojet~dette");
            $detteForm->saveToDao("miniprojet~dette");
        } else {
            $detteForm = jForms::fill("miniprojet~dette", $this->param('idDette'));
            $detteForm->initFromRequest();

            if ($detteForm->check()) {
                $result = $detteForm->prepareDaoFromControls('miniprojet~dette');
                $detteFactory = $result['dao'];
                $courantDette = $result['daorec'];

                $detteFactory->update($courantDette);
            }
        }
        return $this->index();
    }

    function updateDette() {
        $rep = $this->getResponse('html');
        $rep->title = "Dette modification";

        // this is a call for the 'welcome' zone after creating a new application
        // remove this line !
        $rep->bodyTpl = "data";
        $chemin = jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin . 'jelix.css');
        $repWWW = jApp::config()->urlengine['basePath'];
        $rep->addJSLink($repWWW . 'js/mes_scripts.js');
        //$rep->addCSSLink($repWWW . 'css/mes_styles.css');
        $rep->addLink($repWWW . 'favicon/favicon.ico', 'icon'); //Ajoute une favicon au site l'aide p60 ne m'a pas du tout aidée
        //Formulaire ajout dette
        $paramIdDette = $this->param('idDette', 2);
        $detteForm = jForms::create("miniprojet~dette", $paramIdDette);
        $detteForm->initFromDao("miniprojet~dette");

        $rep->body->assign('FORMULAIRE', $detteForm);
        $rep->body->assign('TITRE', 'Modifier une dette');
        $rep->body->assign('SELECTEUR', 'miniprojet~saveDette@classic');
        return $rep;
    }

    function createDette() {
        $rep = $this->getResponse('html');
        $rep->title = "Dette création";


        $rep->bodyTpl = "data";
        $chemin = jApp::config()->urlengine['jelixWWWPath'] . 'design/';
        $rep->addCssLink($chemin . 'jelix.css');
        $repWWW = jApp::config()->urlengine['basePath'];
        $rep->addJSLink($repWWW . 'js/mes_scripts.js');
        //$rep->addCSSLink($repWWW . 'css/mes_styles.css');
        $rep->addLink($repWWW . 'favicon/favicon.ico', 'icon'); //Ajoute une favicon au site l'aide p60 ne m'a pas du tout aidée
        //Formulaire ajout dette
        $detteForm = jForms::create("miniprojet~dette");
        $rep->body->assign('FORMULAIRE', $detteForm);
        $rep->body->assign('TITRE', 'Ajouter une dette');
        $rep->body->assign('SELECTEUR', 'miniprojet~saveDette@classic');
        return $rep;
    }

    function deleteDette() {

        // instanciation de la factory
        $detteFactory = jDao::get("miniprojet~dette");
        // destruction du record 
        $detteFactory->delete($this->param('idDette'));

        return $this->index();
    }

}
