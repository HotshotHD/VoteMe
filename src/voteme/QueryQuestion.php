<?php

namespace voteme;

use pocketmine\scheduler\PluginTask;

class QueryQuestion extends PluginTask {
  
  public function __construct(Main $plugin) {
    parent::__construct($plugin);
    
    $this->plugin = $plugin;
  }
  
  public function onRun($currentTick) {
    foreach($this->plugin->getServer()->getOnlinePlayers() as $player) {
      if($this->plugin->getLastQuestion($player) !== $this->plugin->getQuestion()) {
       foreach($this->plugin->getServer()->getOnlinePlayers() as $player) {
        $this->plugin->setPlayerVoteStatus($player, false);
      }
    }
  }
}
