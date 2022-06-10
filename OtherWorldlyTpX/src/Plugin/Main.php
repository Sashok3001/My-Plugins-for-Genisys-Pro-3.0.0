<?php

namespace Plugin;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\math\Vector3;
use pocketmine\level\Position;

class Main extends PluginBase{
	public function onEnable(){
		$this->getLogger()->info("Плагин включён!");
	}
	public function onCommand(CommandSender $s, Command $cmd, $label, array $args){
		if($cmd->getName() == "tpwp"){
			if(!isset($args[3])){
				$s->sendMessage("Хо-хо-хо, нет.");
				return true;
			}
			if(!is_numeric($args[0])||!is_numeric($args[1])||!is_numeric($args[2])){
				$s->sendMessage("Ты даун? Это не номер!");
				return true;
			}
			$x=$args[0];
			$y=$args[1];
			$z=$args[2];
			$level=$this->getServer()->getLevelByName($args[3]);
			$this->getServer()->loadLevel($args[3]);
			$s->teleport(new Position((float) $x, (float) $y, (float) $z, $level));
			$s->sendMessage("Телепортирован на $x $y $z мира $args[3]");
			return true;
		}
	}
}
?>