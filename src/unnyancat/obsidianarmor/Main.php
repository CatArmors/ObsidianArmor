<?php

namespace unnyancat\obsidianarmor;

use pocketmine\item\ArmorTypeInfo;
use pocketmine\item\ItemIdentifier;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use Refaltor\Natof\CustomItem\CustomItem;

class Main extends PluginBase {
    public static Main $instance;

    protected function onEnable(): void
    {
        $this->getServer()->getLogger()->info("§5Obsidian Armor §fget §aInjected");
    }

    public function loadItems() {
        if (Server::getInstance()->getPluginManager()->getPlugin("CustomItem") != null) {

            $helmet = CustomItem::createHelmetItem(new ItemIdentifier(2008, 0), new ArmorTypeInfo(10, 500, 0), "obsidian helmet");
            $helmet->setTexture('obsidian_helmet');

            $chestplate = CustomItem::createChestPlateItem(new ItemIdentifier(2009, 0), new ArmorTypeInfo(10, 500, 1), "obsidian chestplate");
            $chestplate->setTexture('obsidian_chestplate');

            $leggings = CustomItem::createLeggingsItem(new ItemIdentifier(2010, 0), new ArmorTypeInfo(10, 500, 2), "obsidian leggings");
            $leggings->setTexture('obsidian_leggings');

            $boots = CustomItem::createBootsItem(new ItemIdentifier(2011, 0), new ArmorTypeInfo(10, 500, 3), "obsidian boots");
            $boots->setTexture('obsidian_boots');

            $items = [$chestplate, $helmet, $leggings, $boots];
            foreach ($items as $item) {
                CustomItem::registerItem($item);
            }
        }
    }

    protected function onDisable(): void
    {
        $this->getServer()->getLogger()->info("§cLe test de unnyancat s'arrête");
    }

    protected function onLoad(): void {
        $this->loadItems();
    }
}