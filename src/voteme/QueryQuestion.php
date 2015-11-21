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
      if($this->plugin->getPlayerLastQuestion($player) !== $this->plugin->getQuestion()) {
        $this->plugin->setPlayerLastQuestion($player, $this->plugin->getQuestion());
      }
    }
  }
}
