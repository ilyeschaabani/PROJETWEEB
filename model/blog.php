<?php
class blogm
{
    private int $idblog ; 
    private string  $blogcentent; 
    private string  $titre ; 
    private string  $typeblog ; 
    private string  $username ; 
    private date  $dateblog ; 
    
    public function __constructor ($idb=null,$titre=null,$blogc=null,$username=null ,$dateblog=null,$typeblog=null)
    {
        $this->idblog =$idb ; 
        $this->titre  =$titre ; 
        $this->blogcentent =$blogc ; 
        $this->username  =$username ; 
        $this->dateblog =$dateblog ; 
        $this->typeblog =$typeblog ; 
    }
      public function __construct(int $idb,string $titre,string $blogc,string $username ,date $dateblog,string $typeblog)
    {
        $this->idblog =$idb ; 
        $this->titre  =$titre ; 
        $this->blogcentent =$blogc ; 
        $this->username  =$username ; 
        $this->dateblog =$dateblog ; 
        $this->typeblog =$typeblog ; 
    }
    // getters
    public function GetIdBlog()
    {
       return $this->idblog;
    }
    public function Gettitre()
    {
       return $this->titre;
    }
    public function Getblogcentent()
    {
       return $this->blogcentent;
    }
    public function Getusername()
    {
       return $this->username;
    }
    public function Getdate()
    {
       return $this->dateblog;
    }
    public function Gettypeblog()
    {
       return $this->typeblog;
    }
    // setter
    public function setidblog(int $idblog)
    {
         $this->idblog=$idblog;
    }
    public function settitre(string $titre)
    {
         $this->titre=$titre;
    }
    public function setblogcentent(string $blogcentent)
    {
         $this->blogcentent=$blogcentent;
    }
    public function setusername(string $username)
    {
         $this->username=$username;
    }
    public function setdate(date $dateblog)
    {
         $this->dateblog=$dateblog;
    }
    public function settypeblog(string $typeblog)
    {
         $this->typeblog=$typeblog;
    }

    
}






?>