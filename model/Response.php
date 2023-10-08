<?php

class reponsee
{    
    private int $id;
    private string $contenu_rep;
    private string $date_rep;
    
    public function __constructor($contenu_rep=null ,$date_rep= null )
    {
        $this->contenu_rep=$contenu_rep;
        $this->date_rep=$date_rep;
      
    }

    public function __construct(string $c, string $d)
    {
        $this->contenu_rep=$c;
        $this->date_rep=$d;
        
    }
    public function getId()
    {
        return $this->id;
    }
    public function getcontenu_rep()
    {
        return $this->contenu_rep;
    }
    public function getdate_rep()
    {
        return $this->date_rep;
    }
   
   
   
    public function setcontenu_rep(string $contenu_rep)
    {
         $this->contenu_rep=$contenu_rep;
    }
    public function setdate_rep(string $date)
    {
         $this->date_rep=$date_rep;
    }
   
}
    ?>