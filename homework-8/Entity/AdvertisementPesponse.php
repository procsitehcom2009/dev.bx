<?php

namespace Entity;

class AdvertisementPesponse
{
    private string $targeting;

    /**
     * @return string
     */
    public function getTargeting(): string
    {
        return $this->targeting;
    }

    /**
     * @param string $targeting
     */
    public function setTargeting(string $targeting): void
    {
        $this->targeting = $targeting;
    }


}