<h1 class="apptitle" id="titreh1">miniprojet<br/></h1>

<nav class="block">
    <ul>
   
        <li><a href="{jurl 'miniprojet~index@classic'}" >Accueil</a></li>
        <li><a href="{jurl 'miniprojet~vueType@classic'}" >Types</a></li>
        <li><a href="{jurl 'miniprojet~vueAmi@classic'}" >Amis</a></li>
    </ul>
</nav>

<div class="block" id="transaction">
    <h2>Compte courant</h2>
    <div class="blockcontent">
        <table>
            <thead>
                <tr>
                    <td></td>
                    <td>Libéllé</td>
                    <td>Montant</td>
                    <td>Type</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>

            {foreach $ALLTRANSACTION as $COURANTTRANSACTION}
                <tr {if ($COURANTTRANSACTION->enAttente==1)} class="enAttente" > 
                    <td>⌚</td>{else}><td></td>{/if}
                    <td>{$COURANTTRANSACTION->libelle}</td> 
                    <td class="nombre">{$COURANTTRANSACTION->montant} € </td>
                    <td>{$COURANTTRANSACTION->libelleType}</td> 
                    <td><a href="{jurl 'miniprojet~updateTransaction@classic', array('idTransaction'=>$COURANTTRANSACTION->idTransaction)}" id="modif">✏</a></td>
                    <td><a href="{jurl 'miniprojet~deleteTransaction@classic', array('idTransaction'=>$COURANTTRANSACTION->idTransaction)}" onclick="return confirmDelete()" id="suppr">✖</a></td>
                </tr>
            {/foreach}
            <tfoot>
                <tr>
                    <td></td>
                    <td>TOTAL =</td>
                    <td class="nombre">{$TOTALTRANSACTION} €</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
            </tfoot>

        </table>
           
        <a href="{jurl 'miniprojet~createTransaction@classic', array('idTransaction'=>'NULL')}">Ajouter une transaction</a>
    </div>
</div>
   
<div class="block" id="dette">
    <h2>Dettes</h2>
    <div class="blockcontent">
        <table>
            <thead>
                <tr>
                    
                    <td>Ami</td>
                    <td>Montant</td>
                    <td></td>
                    <td></td>
                    
                </tr>
            </thead>

            {foreach $ALLDETTE as $COURANTDETTE}
                <tr >
                    <td>{$COURANTDETTE->nomAmi}</td> 
                    <td class="nombre">{$COURANTDETTE->montantDette} € </td>
                    
                    <td><a href="{jurl 'miniprojet~updateDette@classic', array('idDette'=>$COURANTDETTE->idDette)}" id="modif">✏</a></td>
                    <td><a href="{jurl 'miniprojet~deleteDette@classic', array('idDette'=>$COURANTDETTE->idDette)}" onclick="return confirmDelete()" id="suppr">✖</a></td>
                </tr>
            {/foreach}
            <tfoot>
                <tr>
                    
                    <td>TOTAL =</td>
                    <td class="nombre">{$TOTALDETTE} €</td>
                    <td></td>
                    <td></td>  
                </tr>
            </tfoot>

        </table>
           
        <a href="{jurl 'miniprojet~createDette@classic', array('idDette'=>'NULL')}">Ajouter une dette</a>
    </div>
    </div>