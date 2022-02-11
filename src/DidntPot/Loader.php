<?php

namespace DidntPot;

use pocketmine\plugin\PluginBase;

class Loader extends PluginBase
{
    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    }
}