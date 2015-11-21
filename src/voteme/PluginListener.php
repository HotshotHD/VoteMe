<?php

namespace voteme;

use voteme\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class PluginListener implements Listener {
  
  public $plugin;
  
  public function __construct(Main $plugin) {
    $this->plugin = $plugin;
  }
  
  public function onJoin(PlayerJoinEvent $event) {
    $player = $event->getPlayer();
    
    $this->plugin->generatePlayerData($player->getName());
    if($this->plugin->getQuestion() !== $this->plugin->getPlayerLastQuestion($player->getName())) {
      $this->plugin->setPlayerLastQuestion($player->getName(), $this->getQuestion());
      $this->plugin->setPlayerVoteStatus($player->getName(), false);
    }
  }
}
