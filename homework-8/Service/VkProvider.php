<?php

namespace Service;

class VkProvider implements AdverttisementInterface
{
    public function publicate(Advertsement $advertsement)
    {
        $httpClient = new HttpClient();
        $result = $httpClient->post("https://vk.com/api/publicate",json_encode([
            'title'=>$advertsement->getTitle(),
            'body'=>$advertsement->getTitle(),
            ]));

        if ($result->successed())
        {
            return (new AdvertisementResponse())
                ->setDuration($result['duration'])
                ->setTargeting($result['targeting']);
        }

        return null;
    }
}