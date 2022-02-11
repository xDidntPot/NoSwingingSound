<?php

namespace DidntPot;

use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\network\mcpe\protocol\types\LevelSoundEvent;

class EventListener implements Listener
{
    /**
     * @param DataPacketSendEvent $ev
     * @return void
     */
    public function onDataPacketSend(DataPacketSendEvent $ev): void
    {
        foreach($ev->getPackets() as $packet)
        {
            /** @var LevelSoundEventPacket $packet */
            if ($packet->pid() == LevelSoundEventPacket::NETWORK_ID)
            {
                if($packet->sound === LevelSoundEvent::ATTACK) $ev->cancel();
                elseif($packet->sound === LevelSoundEvent::ATTACK_NODAMAGE) $ev->cancel();
                elseif($packet->sound === LevelSoundEvent::ATTACK_STRONG) $ev->cancel();
            }
        }
    }
}