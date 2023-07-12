
<?php 

    class Titulaire {
        
        // Définition d'une propriété privée nom de type string pour stocker le nom du titulaire.
        private string $nom;
        // Définition d'une propriété privée prenom de type string pour stocker le prénom du titulaire
        private string $prenom;
        // Définition d'une propriété privée dateNaissance de type DateTime pour stocker la date de naissance du titulaire
        private DateTime $dateNaissance;
        // Définition d'une propriété privée ville de type string pour stocker la ville du titulaire
        private string $ville;
        // Définition d'une propriété privée comptes de type array pour stocker les comptes du titulaire
        private array $comptes;

        

        public function __construct (string $nom, string $prenom, string $dateNaissance, string $ville) {
            // Initialise la propriété nom avec la valeur passée en paramètre
            $this ->nom = $nom;
            // Initialise la propriété prenom avec la valeur passée en paramètre.
            $this ->prenom = $prenom;
            // Initialise la propriété dateNaissance avec une instance de DateTime créée à partir de la valeur passée en paramètre
            $this ->dateNaissance = new DateTime($dateNaissance);
            // Initialise la propriété ville avec la valeur passée en paramètre
            $this ->ville = $ville;
            // Initialise la propriété comptes avec un tableau vide.
            $this ->comptes = [];
        }

        
        // Méthodes getter et setter
        
        public function getNom(){
            // Retourne la valeur de la propriété nom
            return $this->nom;
        }

        public function setNom (string $nom) {
            // Modifie la valeur de la propriété nom avec la valeur passée en paramètre
            $this->nom = $nom;
        }


        

        public function getPrenom() {
            // Retourne la valeur de la propriété prenom
            return $this->prenom;
        }

        public function setPrenom( string $prenom) {
            // Modifie la valeur de la propriété prenom avec la valeur passée en paramètre
            return $this->prenom = $prenom;
        }


        

        public function getDateNaissance (){
            // Retourne la valeur de la propriété dateNaissance
            return $this ->dateNaissance;
        }

        public function setDateNaissance (DateTime $dateNaissance) {
            // Modifie la valeur de la propriété dateNaissance avec la valeur passée en paramètre
            return $this->dateNaissance = $dateNaissance;
        }

        

        public function getVille (){
            // Retourne la valeur de la propriété ville
            return $this ->ville;
        }

        public function setVille (string $ville){
            // Modifie la valeur de la propriété ville avec la valeur passée en paramètre
            return $this ->ville = $ville;
        }

    

        public function getComptes(){
            // Retourne les comptes associés à ce titulaire
            return $this ->comptes;
        }

        public function setComptes( array $comptes){
            // Modifie les comptes associés à ce titulaire avec le tableau de comptes passé en paramètre
            return $this ->comptes = $comptes;
        }

        


        
        public function dateNaissanceString(){
            // Obtient la date de naissance du titulaire.
            $date = $this->getDateNaissance();
            // Formate la date de naissance au format 'Y-m-d'
            $dateString = $date->format('d-m-Y');
            // Retourne la date de naissance formatée en tant que chaîne de caractères
            return $dateString;
        }

    
        
        public function addCompte (Compte $compte) {
            // Ajoute un compte à la liste des comptes associés à ce titulaire
            $this->comptes[] = $compte;
        }
        
        
        
        public function __toString()
        {
            // Renvoie une représentation sous forme de chaîne de caractères du titulaire (prénom et nom)
            return $this->getPrenom()." ".$this->getNom() ;
        }

    

        public function displayTitulaire() {
            // Initialise le résultat avec l'en-tête "Mes titulaires" 
            $result = "Titulaire :<br>";
            // Récupère les informations du titulaire (prénom, nom, date de naissance formatée et ville)
            $titulaires = $this->getPrenom()." ".$this->getNom(). " "." né le : ". $this->dateNaissanceString() . "  " . " à  ". $this -> getVille(). "<br>";
            // Ajoute les informations des titulaires au résultat
            $result .= $titulaires;
            //Retourne le résultat final
            return $result;
        }

        
        public function displayComptesString(){
            // Initialise le résultat avec l'en-tête "Comptes de [prénom] [nom]"
            $result = "Comptes de $this<br>"; 
            // Récupère la liste des comptes associés à ce titulaire
            $comptes = $this->getComptes();
            foreach ($comptes as $compte){
                // Ajoute chaque compte au résultat
                $result .= $compte."<br>";
            }
            // Retourne le résultat final
            return $result;
        }
        
    }


?>