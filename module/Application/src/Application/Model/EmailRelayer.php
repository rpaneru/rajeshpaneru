<?php
namespace Application\Model;

class EmailRelayer 
{    
    public $id;
    public $fromEmail;
    public $relayerHost;
    public $relayerSsl;
    public $relayerUserName;
    public $relayerPassword;
    public $relayerPort;
   
    public function exchangeArray($data)
    {   
        $this-> id = (isset($data['id'])) ? $data['id'] : null;        
        $this-> fromEmail = (isset($data['fromEmail'])) ? $data['fromEmail'] : null;        
        $this-> relayerHost = (isset($data['relayerHost'])) ? $data['relayerHost'] : null;
        $this-> relayerSsl = (isset($data['relayerSsl'])) ? $data['relayerSsl'] : null;        
        $this-> relayerUserName = (isset($data['relayerUserName'])) ? $data['relayerUserName'] : null;
        $this-> relayerPassword = (isset($data['relayerPassword'])) ? $data['relayerPassword'] : null;        
        $this-> relayerPort = (isset($data['relayerPort'])) ? $data['relayerPort'] : null;
    }
}

?>
