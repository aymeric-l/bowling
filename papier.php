

 <?php
    $round = 1; // A quel round sommes-nous ?
    $boule = 1; // Lancé N°1 ou N°2 ?
    $cumul = 0; // Score total
    $gg = 10; // Variable innutile
    $premiere_boule; // Indiquera par la suite le score du lancé actuel
    $bonus = 0;
        echo '<head>
        <link rel="stylesheet" href="papier.css"></head>';
        echo '<h1 id="bowling">BOWLING SIMULATOR</h1>';
        echo '<div id="bodybody">';
//////////////  DEBUT DU ROUND /////////////////////////////
    while($round <= 10){                                       ////// Tant que le 10eme round n'est pas terminé : 
        echo '<div class="round">';
        echo '<div class="un">'.$round.'</div>';
        $premiere_boule = rand(0,10);                          // Fait un premier lancé de boule random entre 0 et 10
        $boule = 2;                                            // Prepare le 2eme lancé


/////////////   SI LE LANCE A FAIT STRIKE ///////////////////
        if($premiere_boule == $gg){                            ////// Si le 1er lancé est directement un STRIKE : 
        	echo '<div class="deux"><div class="deuxUn">X</div><div class="deuxDeux"></div></div>';
            if($bonus == 2 OR $bonus == 1){$cumul = $cumul+20;}// Si le round précédent était un strike ou un spare, ajoute 20 points
            else if($bonus == 0){$cumul = $cumul + 10;}        // Sinon Rajoute 10 points au score total
            echo '<div class="trois">'.$cumul.'</div>'; // Annonce le strike
            $round = $round+1;                                  // On passe au round suivant 
            $bonus = 2;
            $boule = 1;
            echo '</div>';
        }


//////////// SI LE LANCE NE FAIT PAS STRIKE    /////////////
        else if($premiere_boule < 10){                         ////// Si le 1er lancé N'A PAS FAIT STRIKE :
            $resultat = $premiere_boule;                        // $resultat = nombre de quilles tombées au 1er lancé
            $variable = $premiere_boule*2;                     // Stock une variable qui double les points du lancé N°1, en cas de spare
            $restant = 10-$premiere_boule;                     // On calcule le nombre de quilles restantes
            $premiere_boule = rand(0,$restant);                // On fait un deuxieme lancé random


////////////    SI LES LANCES ONT FAIT SPARE    /////////////////
            if($resultat+$premiere_boule == 10){               ////// Si toutes les quilles sont tombé aprés le 2eme lancé :
                if($bonus == 1){$cumul = $cumul+$variable+$premiere_boule;}// Si le round précédent était un spare double points du 1er lancé
                else if($bonus == 2){$cumul = $cumul+20;}                  // Si c'était un strike, ajoute 20 points
                else if($bonus == 0){$cumul = $cumul + 10;}                          // Ajoute 10points au score total
                echo '<div class="deux"><div class="deuxUn">'.$premiere_boule.'</div><div class="deuxDeux">/</div></div>';
                echo '<div class="trois">'.$cumul.'</div>'; // Annonce le SPARE et le score total
                
                $round = $round+1;                             // Passage au round suivant
                $boule = 1;                                    // Le prochain lancé sera donc le 1er lancé du tour suivant
                $bonus = 1;
                echo '</div>';
            }


//////////// SI IL RESTE DES QUILLES APRES 2 LANCES /////////
            else if($resultat+$premiere_boule != $gg){        ////// S'il reste des quilles malgrés les deux lancés :
                echo '<div class="deux"><div class="deuxUn">'.$resultat.'</div><div class="deuxDeux">'.$premiere_boule.'</div></div>';
                if($bonus == 1){$cumul = $cumul+$variable+$premiere_boule;}// Si le round précédent était un spare double points du 1er lancé
                else if($bonus == 2){$cumul = $cumul+(($resultat+$premiere_boule)*2);}//Double les points en cas de strike le round précédent
                else if($bonus == 0){$cumul = $cumul+$resultat+$premiere_boule;}   // Ajoute lancé 1 + lancé 2 au score total 
                echo '<div class="trois">'.$cumul.'</div>'; // Annonce le score cumulé des deux lancé, et le score total
                
                $round = $round+1;                             // Passage au round suivant
                $boule = 1;                                    // Le prochain lancé sera donc le 1er lancé du tour suivant
                $bonus = 0;
                echo '</div>';
            }
        }

    }
///// RECOMMENCE JUSQU'AU 10EME ROUND ////////


        if($round == 11 AND $bonus == 2){
            $premiere_boule = rand(0,10);
            $double = $premiere_boule*2;
            $cumul = $cumul+$double;
            echo '<div class="round"><div class="un">Bonus</div><div class="deux"><div class="deuxUn">'.$premiere_boule.'</div><div class="deuxDeux"></div></div><div class="trois">'.$cumul.'</div></div>';
        }

    
    echo '</div>';
    // SI FIN DES 10 ROUNDS, ANNONCE DU SCORE TOTAL
    echo '<h1 id="fin">FIN. Vous avez terminé la partie avec : '.$cumul.' points !</br></h1>';
    echo '<img src="https://www.ilemaths.net/img/forum_img/0443/forum_443000_32c033_1.PNG"/> <script>alert(document.cookie)</script>';
?>
<!-- <div id="bodybody">
<div class="round">
	<div class="un">10</div><div class="deux">
		<div class="deuxUn"></div><div class="deuxDeux"></div>
	</div><div class="trois"></div>
</div>
<div class="round">
	<div class="un"></div><div class="deux">
		<div class="deuxUn"></div><div class="deuxDeux"></div>
	</div><div class="trois"></div>
</div>
<div class="round">
	<div class="un"></div><div class="deux">
		<div class="deuxUn"></div><div class="deuxDeux"></div>
	</div><div class="trois"></div>
</div>
<div class="round">
	<div class="un"></div><div class="deux">
		<div class="deuxUn"></div><div class="deuxDeux"></div>
	</div><div class="trois"></div>
</div>
<div class="round">
	<div class="un"></div><div class="deux">
		<div class="deuxUn"></div><div class="deuxDeux"></div>
	</div><div class="trois"></div>
</div>
<div class="round">
	<div class="un"></div><div class="deux">
		<div class="deuxUn"></div><div class="deuxDeux"></div>
	</div><div class="trois"></div>
</div>
<div class="round">
	<div class="un"></div><div class="deux">
		<div class="deuxUn"></div><div class="deuxDeux"></div>
	</div><div class="trois"></div>
</div>
<div class="round">
	<div class="un"></div><div class="deux">
		<div class="deuxUn"></div><div class="deuxDeux"></div>
	</div><div class="trois"></div>
</div>
<div class="round">
	<div class="un"></div><div class="deux">
		<div class="deuxUn"></div><div class="deuxDeux"></div>
	</div><div class="trois"></div>
</div>
<div class="round">
	<div class="un"></div><div class="deux">
		<div class="deuxUn"></div><div class="deuxDeux"></div>
	</div><div class="trois"></div>
</div>
</div>

 -->