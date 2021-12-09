<?php

namespace Adapter;

use Entity\Advertisement;

class VkAdvertisementAdapter implements AdvertisementInterface
{
    public function publicate(Advertisement $advertisement)
    {
        $vkAdvertisement = new VkAdvertisement();
        $vkAdvertisement
            ->setTitle($advertisement->getTitle())
            ->setMessageBody($advertisement->getBody());

        $result = (new VkPublicator())->publicate($vkAdvertisement);
    }
}