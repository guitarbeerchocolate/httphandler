<?php
require_once 'classes/autoload.php';
class httphandler
{
  private $getObject;
  private $postObject;
  private $fileObject;
  private $webpath;
  function __construct($get = NULL, $post = NULL, $file = NULL)
  {
    if(!empty($get))
    {
     $this->getObject = (object) $get;
     $this->checkForGetWebPath();
     $this->checkForGetMethod();
    }
    if(!empty($post))
    {
      $this->postObject = (object) $post;      
      $this->checkForPostWebPath();      
      if(!empty($file))
      {
        $this->fileObject = $file;        
      }
      $this->checkForPostMethod();
    }
  }
   
  private function checkForGetMethod()
  {
    if($this->getObject->method && (method_exists($this, $this->getObject->method)))
    {
      $evalStr = '$this->'.$this->getObject->method.'();';
      eval($evalStr);
    }
    else
    {
      $oStr = 'Invalid method supplied';      
      if($this->webpath)
      {
        header('Location:'.$this->webpath.'?message='.urlencode($oStr));
      }
      else
      {
        echo $oStr;
      }          
    }
  }

  private function checkForPostMethod()
  {
    if($this->postObject->method && (method_exists($this, $this->postObject->method)))
    {
      $evalStr = '$this->'.$this->postObject->method.'();';
      eval($evalStr);
    }
    else
    {
      $oStr = 'Invalid method supplied';      
      if($this->webpath)
      {
        header('Location:'.$this->webpath.'?message='.urlencode($oStr));
      }
      else
      {
        echo $oStr;
      }          
    }
  }

  private function checkForGetWebPath()
  {
    if($this->getObject->webpath)
    {
      $this->webpath = urldecode($this->getObject->webpath);
    }
  }

  private function checkForPostWebPath()
  {
    if($this->postObject->webpath)
    {
      $this->webpath = urldecode($this->postObject->webpath);
    }
  }
  
  /* User functions here */
  function dotheget()
  {
    echo '<br />Doing the get<br />';
  }

  function dothepost()
  {
    echo '<br />Doing the post<br />';
  }

  function dotheput()
  {
    echo '<br />Doing the put<br />';
  }

  function singleuploadfile()
  {
    $fu = new fileupload;    
    $fu->webpath = $this->postObject->webpath;
    $fu->files = $this->fileObject;    
    $fu->singleupload('1');
  }

  function multiuploadfile()
  {
    $fu = new fileupload;    
    $fu->webpath = $this->postObject->webpath;
    $fu->files = $this->fileObject;    
    $fu->multiupload('1');
  }
}
/*
Example form 
<form action="httphandler.class.php" method="POST">
<input name="method" type="hidden" value="dothepost" />
<input name="webpath" type="hidden" value="<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" />
<input name="text" type="text" /><br />
<input type="submit" />
</form>
*/
new httphandler($_GET, $_POST, $_FILES);
?>