<h1 class="apptitle" id="titreh1">miniprojet<br/></h1>

<nav class="block">
    <ul>
      
        <li><a href="{jurl 'miniprojet~index@classic'}" >Accueil</a></li>
        <li><a href="{jurl 'miniprojet~vueType@classic'}" >Types</a></li>
        <li><a href="{jurl 'miniprojet~vueAmi@classic'}" >Amis</a></li>
    </ul>
</nav> 

<div class="block">
    <h2>Liste des amis</h2>
    <div class="blockcontent">
        <table>
            <thead>
                <tr>
                    <td>NomAmi</td>
                    <td></td>
                    <td></td> 
                </tr>
            </thead>

            {foreach $ALLAMI as $COURANTAMI}
                <tr >
                    <td>{$COURANTAMI->nomAmi}</td> 
                    <td><a href="{jurl 'miniprojet~updateAmi@classic', array('idAmi'=>$COURANTAMI->idAmi)}" id="modif">✏</a></td>
                    <td><a href="{jurl 'miniprojet~deleteAmi@classic', array('idAmi'=>$COURANTAMI->idAmi)}" onclick="return confirmDelete()" id="suppr">✖</a></td>
                </tr>
            {/foreach}
           
        </table>
           
        <a href="{jurl 'miniprojet~createAmi@classic', array('idAmi'=>'NULL')}">Ajouter un ami</a>
    </div> 