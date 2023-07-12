




<?php

    
    spl_autoload_register(function ($class_name) {
        
        require $class_name . '.php';
    });

    // Création de deux objets Titulaire
    $titulaire1 = new Titulaire("Murmann", "Mickael", "12/12/1980", "Strasbourg ");
    $titulaire2 = new Titulaire("Mathieu", "Quentin", "03/07/1990", "Mulhouse");


    // Création de trois objets Compte
    $compte1 = new Compte("Livret A :", 20.456, "euros", $titulaire1);
    $compte2 = new Compte("Livret Jeune :", 3216.123, "euros", $titulaire1);
    $compte3 = new Compte("Livret B :", 4561.67 ,"euros", $titulaire2);

    // Affichage des informations du premier titulaire
    
    echo $titulaire1->displayTitulaire();
    echo $titulaire1->displayComptesString();
    echo "<br>";

    

    // Affichage des informations du deuxième titulaire
    
    echo $titulaire2->displayTitulaire();
    echo $titulaire2->displayComptesString();
    echo "<br>";

    echo "Credit:<br>";

    // Effectue une opération de crédit sur le premier compte
    echo $compte1->credit(154);
    // Crédite le compte 1 de 154 euros

    echo "Debit:<br>";
    // Effectue une opération de débit sur le deuxième compte
    // Débite le compte 2 de 95 euros
    echo $compte2->debit(95);
    echo "<br>";

    echo "Transfert:<br>";
    // Effectue une opération de transfert entre deux comptes
    // Transfère 18 euros du compte 1 vers le compte 3
    echo $compte1->transfert($compte3, 18);




?>