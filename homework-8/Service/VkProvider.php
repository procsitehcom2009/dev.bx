<?php

namespace Service;

class VkProvider implements AdvertisementInterface
{
    public function publicate(Advertisement $advertisement)
    {
        $httpClient = new HttpClient();
        $result = $httpClient->post("https://vk.com/api/publicate",json_encode([
            'title'=>$advertisement->getTitle(),
            'body'=>$advertisement->getTitle(),
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