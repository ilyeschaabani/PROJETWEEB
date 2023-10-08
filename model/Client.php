<?php

class client
{
    private int $id;
    private string $contenu;
    private int $id_user;

    

   
    public function __constructor($contenu=null, $id_user=null)
    {
        $this->id_user=$id_user;
        $this->id_user=$id_user;
      
    }

    public function __construct(  string $c, int $i)
    {
        $this->contenu=$c;
        $this->id_user=$i;
        
    }
    public function getId()
    {
        return $this->id;
    }
    public function getIdUser()
    {
        return $this->id_user;
    }
     public function getcontenu()
    {
        return $this->contenu;
    }
   
    public function setcontenu(string $contenu)
    {
         $this->contenu=$contenu;
    }
    public function setiduser(int $id_user)
    {
         $this->id_user=$id_user;
    }
}
    ?>