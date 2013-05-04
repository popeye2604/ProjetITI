<?php
/**
* @package     jelix
* @subpackage  core_response
* @author      Laurent Jouanneau
* @copyright   2006-2010 Laurent Jouanneau
* @link        http://www.jelix.org
* @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/

/**
* output RDF content.
* This is a basic RDF generator, which generates content from
* an array of data.
* @package  jelix
* @subpackage core_response
* @see jResponse
*/

final class jResponseRdf extends jResponse {
    /**
    * @var string
    */
    protected $_type = 'rdf';

    /**
     * List of object or array, which will be transform into RDF content
     * @var array
     */
    public $data;

    /**
     * a template selector for complex RDF content.
     * keep empty if you have a simple array of array in $data :
     * RDF content will be generated by a simple generator.
     * if you specify a template, you don't have to fill other
     * properties (except data)
     * @var string
     */
    public $template;

    /**
     * namespace of the attributes and elements that will content your data.
     * @var string
     */
    public $resNs="http://dummy/rdf#";
    /**
     * namespace prefix
     * @var string
     */
    public $resNsPrefix='row';
    /**
     * uri prefix of all ressources
     * @var string
     */
    public $resUriPrefix = "urn:data:row:";
    /**
     * uri of the root sequence
     * @var string
     */
    public $resUriRoot = "urn:data:row";
    /**
     * list of array values you want to put in attributes
     * @var string
     */
    public $asAttribute=array();
    /**
     * list of array values you want to put in elements
     * @var string
     */
    public $asElement=array();

    public function output(){
        
        if($this->_outputOnlyHeaders){
            $this->sendHttpHeaders();
            return true;
        }
        
        $this->_httpHeaders['Content-Type']='text/xml;charset='.jApp::config()->charset;

        if ($this->template !='') {
            $tpl= new jTpl();
            $tpl->assign('data',$this->data);
            $content = $tpl->fetch($this->template);
        }
        else {
            $content = $this->generateContent();
        }
        
        $this->sendHttpHeaders();
        echo '<?xml version="1.0" encoding="'.jApp::config()->charset.'"?>';
        echo $content;
        return true;
    }

    protected function generateContent() {
        ob_start();
        $EOL="\n";
        echo '<RDF xmlns:RDF="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/1999/02/22-rdf-syntax-ns#"'.$EOL;
        echo '  xmlns:',$this->resNsPrefix,'="',$this->resNs,'"  xmlns:NC="http://home.netscape.com/NC-rdf#">',$EOL;

        echo '<Bag RDF:about="'.$this->resUriRoot.'">'.$EOL;
        foreach($this->data as $dt){
            echo "<li>\n<Description ";
            // NC:parseType="Integer"
            if(is_object($dt))
                $dt=get_object_vars ($dt);
            if(count($this->asAttribute) || count($this->asElement)){
                foreach($this->asAttribute as $name){
                    echo $this->resNsPrefix,':',$name,'="',htmlspecialchars($dt[$name]),'" ';
                }
                if(count($this->asElement)){
                    echo ">\n";
                    foreach($this->asElement as $name){
                        echo '<',$this->resNsPrefix,':',$name,'>',htmlspecialchars($dt[$name]),'</',$this->resNsPrefix,':',$name,">\n";
                    }
                    echo "</Description>\n</li>\n";
                }else
                    echo "/>\n</li>\n";

            }else{
                if(count($dt)){
                    echo ">\n";
                    foreach($dt as $name=>$val){
                        echo '<',$this->resNsPrefix,':',$name,'>',htmlspecialchars($val),'</',$this->resNsPrefix,':',$name,">\n";
                    }
                    echo "</Description>\n</li>\n";
                }else{
                    echo "/>\n</li>\n";
                }
            }
        }
        echo "</Bag>\n</RDF>\n";
        return ob_get_clean();
    }
}
