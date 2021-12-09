<?php

namespace Service;

class VkProvider implements AdvertisementInterface
{
    public function publicate(Advertisement $advertisement): AdvertisementResponse
    {
        return (new AdvertisementAdapter())->publicate($advertisement);
    }
}