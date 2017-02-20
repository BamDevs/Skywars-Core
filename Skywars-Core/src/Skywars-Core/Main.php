<?php

namespace SWCore;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Item;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase implements Listener
{

    public $prefix = C::WHITE."[".C::AQUA."SW".C::RED."Core".C::WHITE."] ";

    public function onEnable()
    {
        $this->getLogger()->info($this->prefix."wurde geladen");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function MainItems(Player $player)
    {
        $player->getInventory()->setItem(0, Item::get(345)->setCustomName(C::BOLD.C::AQUA."Teleporter"));
    }


    public function onJoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        $name = $player->getName();
        $ds = $this->getServer()->getDefaultLevel()->getSafeSpawn();
        $player->setGamemode(0);
        $player->teleport($ds);
        $event->setJoinMessage("");
        $player->setGamemode(0);
        if($player->isOP()){
            $event->setJoinMessage(C::RED.$name.C::AQUA." hat das Spiel betreten");
        }
    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args)
    {
        $player = $sender;
        $name = $sender->getName();
        switch ($cmd->getName()) {
            case "Fly":

        }


    }


}