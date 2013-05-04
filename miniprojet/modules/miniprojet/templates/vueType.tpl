<h1 class="apptitle" id="titreh1">miniprojet<br/></h1>

<nav class="block">
    <ul>
      
        <li><a href="{jurl 'miniprojet~index@classic'}" >Accueil</a></li>
        <li><a href="{jurl 'miniprojet~vueType@classic'}" >Types</a></li>
        <li><a href="{jurl 'miniprojet~vueAmi@classic'}" >Amis</a></li>
    </ul>
</nav>
    
<div class="block">
    <h2>Liste des types</h2>
    <div class="blockcontent">
        <table>
            <thead>
                <tr>
                    <td>Libéllé</td>
                    <td></td>
                    <td></td>
                    
                </tr>
            </thead>

            {foreach $ALLTYPE as $COURANTTYPE}
                <tr >
                    <td>{$COURANTTYPE->libelleType}</td> 
                    <td><a href="{jurl 'miniprojet~updateType@classic', array('idType'=>$COURANTTYPE->idType)}" id="modif">✏</a></td>
                    <td><a href="{jurl 'miniprojet~deleteType@classic', array('idType'=>$COURANTTYPE->idType)}" onclick="return confirmDelete()" id="suppr">✖</a></td>
                </tr>
            {/foreach}
           
        </table>
           
        <a href="{jurl 'miniprojet~createType@classic', array('idType'=>'NULL')}">Ajouter un type</a>
    </div>    

