<?php

namespace LC\commands;

use pocketmine\entity\object\ItemEntity;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemTypeIds;
use pocketmine\item\VanillaItems;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as MG;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
use pocketmine\Server;
use pocketmine\plugin\Plugin;
use pocketmine\item\Item;

use LC\LobbyCore;

class HubCommand extends Command
{
    private $plugin;

    public function __construct()
    {
        parent::__construct("hub", "Teleport you to the server spawn!", null, ["hub", "lobby"]);
        $this->setPermission("lobbycore.command.hub");
    }

    public function execute(CommandSender $player, string $label, array $args)
    {
        if (!$player instanceof Player)return; {
            if (!$player->hasPermission("lobbycore.command.hub")) {
                $player->sendMessage("No tienes permisos");
            } else {
                $this->plugin = LobbyCore::getInstance();
                $player->teleport($player->getServer()->getWorldManager()->getDefaultWorld()->getSafeSpawn());
                $player->getInventory()->clearALL();
                $player->getArmorInventory()->clearALL();

                $item1 = VanillaItems::DIAMOND_AXE();
                $item1->setCustomName("Cosmeticos");

                $item2 = VanillaItems::COMPASS();
                $item2->setCustomName("Games");

                $item3 = VanillaItems::BOOK();
                $item3->setCustomName("Informacion");


                $player->getInventory()->setItem(0, $item1);
                $player->getInventory()->setItem(4, $item2);
                $player->getInventory()->setItem(8, $item3);
            }
        }
    }
}