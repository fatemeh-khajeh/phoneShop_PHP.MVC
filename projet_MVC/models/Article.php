<?php
class Article extends Model
{
    public function __construct()     //herite de model et utilise sa propriété public table pour designer la table de la base de donnée
    {
        $this->table = "article";
        $this->getConnection();
    }

    public function findById( $id)
    {
        $sql = "SELECT * FROM ".$this->table. " WHERE idproduit='" .$id."';";
        $query = $this->_connexion->prepare($sql);
        $query->execute();

        return $query->fetch();
    }
}