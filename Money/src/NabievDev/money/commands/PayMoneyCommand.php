<?php

namespace NabievDev\money\commands;

use NabievDev\money\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Server;

/**
 * Class PayMoneyCommand
 * @package NabievDev\money\commands
 */
class PayMoneyCommand extends PluginCommand
{
    /**
     * PayMoneyCommand constructor.
     * @param string $name
     * @param Main $owner
     */
    public function __construct(string $name, Main $owner)
    {
        parent::__construct($name, $owner);
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     * @return bool|mixed
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender->isOp() or !$sender->hasPermission("pay.command"))
        {
            $sender->sendMessage("§cЧтобы использовать данную комманду, нудно иметь донат §eBOG§C. Ее вы можете купить на сайте: §bhttps://shop.huyna.com §сза 1000 рублей по акции вместо 3000!!!\n1000 игровых монет - 10 рублей! Успей!!");
            return true;
        }
        $money = Server::getInstance()->getPluginManager()->getPlugin("Economy")->getMoney($sender->getName());
        if($money < 1000000)
        {
            $sender->sendMessage('§cВыводить деньги можно только после §b1 000 000 §cмонет!');
            return true;
        }
        if($money >= 1000000)
        {
            $sender->sendMessage('§cЧтобы снять деньги со счета, надо столько же купить купонов. 1 купон - 1 настоящий рубль. Купить вы их можете на сайте автодоната: §bhttps://shop.huynya.com');
            return true;
        }
        return true;
    }
}
