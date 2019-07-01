<?php

namespace NabievDev\money;

use NabievDev\money\commands\PayMoneyCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

/**
 * Class Main
 * @package NabievDev\money
 */
class Main extends PluginBase
{
    public function onEnable()
    {
        Server::getInstance()->getCommandMap()->register("paymoney", new PayMoneyCommand("paymoney", $this));
        $this->getLogger()->info("§cPlugin by vk.com/nabievdev");
    }
}