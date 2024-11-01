<?php

// tableau de proverbes Japonais fourni
$proverbesJap = array(
	"Vous pouvez rester immobile sur le flot des ondes, mais non sur le flot du monde.",
	"La culture, c'est ce qui demeure dans l'homme lorsqu'il a tout oublié.",
	"La mort est à la fois plus grande qu'une montagne et plus petite qu'un cheveu.",
	"La grenouille dans le puits ne voit jamais l'océan.",
	"Celui qui confesse son ignorance la montre une fois ; celui qui essaye de la cacher la montre plusieurs fois.",
	"Même la pensée d’une fourmi peut toucher le ciel.",
	"On ne vide pas l'océan avec un coquillage.",
	"Quand on veut chercher un abri, il faut choisir l'ombre d'un grand arbre.",
	"Aucune route n'est longue aux côtés d'un ami.",
	"Apprend la sagesse dans la sottise des autres."
);

// j'affecte à la variable "citation" le résultat de la structure conditionnelle, qui vérifie si "choix" est défini dans l'URL. Si oui : la valeur associée est affectée à $citation

?>

<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Formulaire - citations</title>
    
      <!-- style CSS -->
      <style>
        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        form {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            width: 50%;
        }
        input {
            width: 50%;
        }
        p {
            font-style: italic;
        }
      </style>
</head>

<body>
    <!-- définition d'un h1 -->
    <h1>Proverbes Japonais</h1>
    <!-- création d'un formulaire ayant pour method get -->
     <form method='get' action=''>
            <!-- balise texte qui va nous permettre d'afficher les différents résultats -->
            <p id='recupVal'>"<?php 
            // définition d'un espace PHP
            // structure conditionnelle vérifiant si "choix" est bien définit dans l'URL grâce à "$_GET"
            if (isset($_GET['choix'])) {
                // affectation à la variable "citation" le résultat de la structure conditionnelle ayant pour condition : si grâce à "$_GET", je retrouve "choix" dans l'URL, j'affecte à $citation la valeur associée à "choix", sinon $citation se verra affecté une chaine de caractères vide
                $citation = ($_GET['choix'] ?? '');
                // j'utilise la fonction "echo" pour afficher la valeur se trouvant à l'emplacement égal à la valeur affectée à $citation moins 1 pour rattraper le décalage de 1 entre le nombre de lignes du tableau allant de 0 à 9 alors que les chiffres entrés vont de 1 à 10
                echo $proverbesJap[$citation - 1]; 
            } else {
                // si "choix" n'est pas défini dans l'URL alors j'affiche la chaine de caractères suivante :
                echo "Indiquez un nombre compris entre 1 et 10 !";
            }
            ?>"</p>
            <input type='range' min='1' max='10' name='choix' onchange='updateTextInput(this.value);' value='<?php echo $citation; ?>'>
            <!-- j'affecte à la value de l'input type='range' la fonction "echo" qui me permet de maintenir la position de la barre "range" à l'emplacement dernièrement choisi, car sinon, elle retournait de base à la position 6 -->
            <br>
            <input type='submit' value='afficher un proverbe'>
      </form>
      <script>
            //laisser cette instruction js ! Elle permettra d'exécuter le type input lors d'une modification
            function updateTextInput(val) 
            {
                  document.getElementById('recupVal').innerHTML = val; 
            }
      </script>
</body>

</html>