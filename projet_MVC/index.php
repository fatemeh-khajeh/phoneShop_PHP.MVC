<?php
//on va generer une constante qui contient le chemin vers index
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

//on require le controller principal et le model principal
require_once(ROOT.'app/Controller.php');
require_once(ROOT.'app/Model.php');

//var_dump($_GET);

//on separe les parametre
$params = explode('/', $_GET['p']);

//on verifie si le parametre existe
if($params[0] != "")
{
    $controller = ucfirst($params[0]);
    $action = isset($params[1]) ? $params[1] : 'index';     // si le deuxieme parametre n'existe pas on le remplace par index et on charge le tout dans ation

    require_once(ROOT.'controllers/'.$controller.'.php');   // on cherche dans le dossier controller le controller qui a ete envoyer en parametre

    $controller = new $controller();                        // on intantie le controller par lui meme 

    if(method_exists($controller, $action))
    {
        unset($params[0]);                                  //on enleve les deux premier paramettre dans le paramettre pour pouvoir utilser juste le troisieme
        unset($params[1]);                                  //on pourrais avoir besoin de tous les autre parametre sauf les deux premier qui sont les chemins
        call_user_func_array([$controller, $action], $params);
        //$controller->$action();                             // on ajoute l,action dans la class //comme on ne conait pas en avance l,action on utilise une variable
    }
    else
    {
        http_response_code(404);
        echo "la page demandé n'existe pas";
    }
    
}
else
{
    //controller par defaut
    $controller = 'Articles';
    $action =  'index'; 
    require_once(ROOT.'controllers/'.$controller.'.php');
    $controller = new $controller();  
    $controller->$action(); 
     
}

 