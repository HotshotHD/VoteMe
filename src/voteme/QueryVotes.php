<?php

namespace voteme;

use voteme\Main;
use pocketmine\scheduler\PluginTask;

class QueryVotes extends PluginTask {
  
  public function __construct(Main $plugin) {
    parent::__construct($plugin);
    
    $this->plugin = $plugin;
  }
  
  public function onRun($currentTick) {
    if($this->plugin->getQuestion() !== $this->plugin->getLastQuestion()) {
      $this->plugin->setNoVotes(0);
      $this->plugin->setYesVotes(0);
    }
  }
}
