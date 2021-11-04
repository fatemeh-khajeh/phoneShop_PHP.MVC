<?php
abstract class controller                               //controlleur principal qui doit etre herité
{
    public function loadModel(string $model)            //fonction qui permet de retrouver le bon model de l'appeler et de l'instancier 
    {                                                   //la function qui herite de controller n'a plus besoin d'instantier avant d,utiliser
        require_once(ROOT.'models/'.$model.'.php');     
        $this->$model = new $model();
    }

    public function render(string $fichier, array $data = [])              //function qui recherche et appelle la vue desirer en fonction du fichier d'entrer
    {
        extract($data);                                                    //permet de recuperer le nom de la valeur de la variable transmis pour utilisation

        //on demare le buffer de sorti
        ob_start();                                                         

        require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$fichier.'.php');  //on recupere le nom du controller et on le passe en minuscule
                                                                                       //grace a "strtolower(get_class($this)" donc faut s'assure que le dossier qui contient la vue a le meme nom que le controlleur em minuscule

        $content = ob_get_clean();

        require_once(ROOT.'views/layouts/default.php');
    }                                                                                   



}