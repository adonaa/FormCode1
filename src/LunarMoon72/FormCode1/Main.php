<?php

namespace LunarMoon72\FormCode1;

use pocketmine\plugin\PluginBase;

use pocketmine\Player;

use pocketmine\Server;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\event\Listener;


class Main extends PluginBase implements Listener{
	public function onEnabled(){
		$this->getServer->getPluginManager->registerEvents($this,$this);
		$this->getLogger()->info("Plugin is enabled");
	}
	
	public function onCommand(Command $cmd, CommandSender $sender, String $label, Array $args) : bool {
        switch($cmd->getName()){
            case "form1":
              if($sender instanceof Player){
                  $this->form($sender);
              } else {
                     $sender->sendMessage("You arnt a player, to open the form; join the game.");
              }
        }
        return true;
    } 
    public function form($player){
    	$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
    	$form = $api->createSimpleForm(function (Player $player, int $data = null){
    		$result = $data;
    		if($result === null){
    			return true;
    		}

    	});
    	$form->setTitle("Form Example");
    	$form->setContent("Press a button!");
    	$form->addButton("Youtube");
    	$form->addButton("Discord");
    }

}
