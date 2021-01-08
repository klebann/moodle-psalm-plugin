<?php
namespace Klebann\MoodlePsalmPlugin;

use Klebann\MoodlePsalmPlugin\Hooks\ReturnTypeProvider;
use Klebann\MoodlePsalmPlugin\Hooks\StrictVisibility;
use SimpleXMLElement;
use Psalm\Plugin\PluginEntryPointInterface;
use Psalm\Plugin\RegistrationInterface;

class Plugin implements PluginEntryPointInterface
{
    public function __invoke(RegistrationInterface $psalm, ?SimpleXMLElement $config = null): void
    {
        if(class_exists(StrictVisibility::class)){
            $psalm->registerHooksFromClass(StrictVisibility::class);
        }

        if(class_exists(ReturnTypeProvider::class)){
            $psalm->registerHooksFromClass(ReturnTypeProvider::class);
        }
    }
}
