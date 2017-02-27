<?php
    $round = 1; // A quel round sommes-nous ?
    $boule = 1; // Lancé N°1 ou N°2 ?
    $cumul = 0; // Score total
    $gg = 10; // Variable innutile
    $premiere_boule; // Indiquera par la suite le score du lancé actuel
    $bonus = 0;
        echo '<head><link rel="stylesheet" href="bowling.css"></head>';
        echo '<div id="contenaire">';
//////////////  DEBUT DU ROUND /////////////////////////////
    while($round <= 10){                                       ////// Tant que le 10eme round n'est pas terminé : 
        echo '<div id="round">';
        echo '<p style="color:red;font-size:20px">Round N°'.$round.' : </p>'; // Indique à quel round nous sommes
        $premiere_boule = rand(0,10);                          // Fait un premier lancé de boule random entre 0 et 10
        echo 'Resultat du lancé N° '.$boule.' : '.$premiere_boule.'</br></br>'; // Affiche le nombre de quilles tombées au premier lancé
        $boule = 2;                                            // Prepare le 2eme lancé


/////////////   SI LE LANCE A FAIT STRIKE ///////////////////
        if($premiere_boule == $gg){                            ////// Si le 1er lancé est directement un STRIKE : 
            if($bonus == 2 OR $bonus == 1){$cumul = $cumul+20;}// Si le round précédent était un strike ou un spare, ajoute 20 points
            else if($bonus == 0){$cumul = $cumul + 10;}        // Sinon Rajoute 10 points au score total
            echo '<h3 style="color:blue">STRIKE ! 10 points ! '.' '.'Score total : '.$cumul.'</h3></br>'; // Annonce le strike
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
            echo 'Resultat du lancé N° '.$boule.' : '.$premiere_boule.'</br>'; // Annonce le résultat du 2eme lancé


////////////    SI LES LANCES ONT FAIT SPARE    /////////////////
            if($resultat+$premiere_boule == 10){               ////// Si toutes les quilles sont tombé aprés le 2eme lancé :
                if($bonus == 1){$cumul = $cumul+$variable+$premiere_boule;}// Si le round précédent était un spare double points du 1er lancé
                else if($bonus == 2){$cumul = $cumul+20;}                  // Si c'était un strike, ajoute 20 points
                else{$cumul = $cumul + 10;}                          // Ajoute 10points au score total
                echo '<h3 style="color:green">Spare ! 10 points ! '.' '.' Score total : '.$cumul.'</h3></br>'; // Annonce le SPARE et le score total
                
                $round = $round+1;                             // Passage au round suivant
                $boule = 1;                                    // Le prochain lancé sera donc le 1er lancé du tour suivant
                $bonus = 1;
                echo '</div>';
            }


//////////// SI IL RESTE DES QUILLES APRES 2 LANCES /////////
            else if($resultat+$premiere_boule != $gg){        ////// S'il reste des quilles malgrés les deux lancés :
                if($bonus == 1){$cumul = $cumul+$variable+$premiere_boule;}// Si le round précédent était un spare double points du 1er lancé
                else if($bonus == 2){$cumul = $cumul+(($resultat+$premiere_boule)*2);}//Double les points en cas de strike le round précédent
                else if($bonus == 0){$cumul = $cumul+$resultat+$premiere_boule;}   // Ajoute lancé 1 + lancé 2 au score total 
                echo '<p style="color:violet">'.($resultat+$premiere_boule).' quilles ce tour. Score total : <span style="font-size:25px;">'.$cumul.'</span></p></br>'; // Annonce le score cumulé des deux lancé, et le score total
                
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
            echo 'Lancé bonus ! Nombre de quilles tombées : '.$premiere_boule.'</br>';
            $cumul = $cumul+$double;
            echo $double.' points sont ajoutés à votre score !';
        }

    echo '</div>';
    // SI FIN DES 10 ROUNDS, ANNONCE DU SCORE TOTAL
    echo '<h1 id="fin">FIN. Vous avez terminé la partie avec : '.$cumul.' points !</br>TABLEAU DES SCORE VERSION PAPIER CI DESSOUS </h1>';
?>