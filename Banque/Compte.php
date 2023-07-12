<h1>Exo Banque</h1>

<p>
    Vous êtes en charge de créer un projet orienté objet permettant de gérer des titulaires et leurs comptes bancaires respectifs. <br>

    Un compte bancaire est composé des éléments suivants<br>
        . Un libellé (compte courant, livret A, ...) <br>
        . Un solde initial <br>
        . Une devise monétaire <br>
        . Un titulaire unique <br>
    
    Un titulaire comporte : <br>

        . Un nom <br>
        . Un prénom <br>
        . Une date de naissance <br>
        . Une ville <br>
        . L'ensemble de ses comptes bancaires. <br>
    Sur un compte bancaire, on doit pouvoir : <br>

        . Créditer le compte X euros <br>
        . Débiter le compte de X euros <br>
        . Effectuer un virement d'un compte à l'autre. <br>
    
    On doit pouvoir <br>

        . Afficher toutes les informations d'un titulaire (dont l'âge) et l'ensemble des comptes appartenant à celui-ci <br>
        . Afficher totues les informations d'un compte bancaire, notamment le nom / prénom du titulaire du coompte<br>
</p>

<h2>Résultat :</h2>

<?php

    class Compte {
        // Définition de la propriété privée $libelle qui représente le libellé du compte
        private string $libelle;
        // Définition de la propriété privée $soldeInit qui représente le solde initial du compte
        private float $soldeInit;
        // Définition de la propriété privée $devise qui représente la devise du compte
        private string $devise;
        // Définition de la propriété privée $titulaire qui représente le titulaire du compte
        private Titulaire $titulaire;

        
        public function __construct (string $libelle, float $soldeInit, string $devise, Titulaire $titulaire) {
            // Affectation du libellé passé en paramètre à la propriété $libelle
            $this ->libelle = $libelle;
            // Affectation du solde initial passé en paramètre à la propriété $soldeInit
            $this ->soldeInit = $soldeInit;
            // Affectation de la devise passée en paramètre à la propriété $devise
            $this ->devise = $devise;
            // Affectation du titulaire passé en paramètre à la propriété $titulaire
            $this ->titulaire = $titulaire;
            // Ajout du compte actuel à la liste des comptes du titulaire
            $this ->titulaire->addCompte($this);
        }

        
        //Méthodes getter et setter

        public function getLibelle(){
            // Retourne la valeur de la propriété $libelle
            return $this->libelle;
        }

        public function setLibelle( string $libelle){
            // Affecte la valeur du libellé passé en paramètre à la propriété $libelle
            $this->libelle = $libelle;
        }

        

        public function getSoldeInit(){
            // Retourne la valeur de la propriété $soldeInit
            return $this->soldeInit;
        }

        public function setSoldeInit( float $soldeInit){
            // Affecte la valeur du solde initial passé en paramètre à la propriété $soldeInit
            $this->soldeInit = $soldeInit;
        }        

        

        public function getDevise(){
            // Retourne la valeur de la propriété $devise
            return $this->devise;
        }

        public function setDevise( string $devise){
            // Affecte la valeur de la devise passée en paramètre à la propriété $devise
            $this->devise = $devise;
        }

        

        public function getTitulaire(){
            // Retourne la valeur de la propriété $titulaire
            return $this->titulaire;
        }

        public function setTitulaire( Titulaire $titulaire){
            // Affecte le titulaire passé en paramètre à la propriété $_titulaire
            $this->titulaire = $titulaire;
        }

       

        
        public function getSoldeInitFloat() {
            // Arrondit le solde initial à 3 décimales et le stocke dans une variable locale
            $soldeInitFloat = round($this->soldeInit, 3);
            // Retourne la valeur arrondie du solde initial
            return $soldeInitFloat;
        }


        
        public function __toString()
        {
            // Retourne une représentation sous forme de chaîne de caractères du compte, en concaténant le libellé, le solde initial, la devise et le titulaire
            return $this->libelle. " " .$this->soldeInit. " " .$this->devise. " " .$this->titulaire;
        }

        

        public function credit(float $credit){
            // Ajoute le montant du crédit au solde initial du compte
            $this->soldeInit += $credit;
            // Affiche un message indiquant que le compte a été crédité et affiche le nouveau solde
            echo "Le compte ". $this ->libelle." de ". $this ->titulaire ." a été débité de : ". $credit . " euros<br>
                Son solde est de ". $this ->soldeInit. " euros<br><br>";
            
        }

        
        public function debit(float $debit){
            // Soustrait le montant du débit au solde initial du compte
            $this->soldeInit -= $debit;
            // Affiche un message indiquant que le compte a été débité et affiche le nouveau solde
            echo "Le compte ". $this ->libelle." de ". $this ->titulaire ." a été débité de : ". $debit . " euros<br>
                Son solde est de ". $this ->soldeInit. " euros<br>";
            
        }
            
        
        public function transfert(Compte $destination, float $transfert){
            // Effectue un débit du montant de transfert sur le compte actuel
            $this -> debit($transfert);
            // Effectue un crédit du montant de transfert sur le compte de destination
            $destination -> credit($transfert);
            // Affiche un message indiquant que le montant a été transféré du compte actuel au compte de destination
            echo "La somme de ".$transfert." euros a été transférée du ".$this ->libelle." de ". $this ->titulaire ." à ". $destination ->libelle. " de " . $destination->titulaire ." <br>";
            
        }
    };

    
?>