<?php

namespace Service;

interface AdvertisementInterface
{
    public function publicate(Advertisement $advertisement): AdvertisementResponse;
}