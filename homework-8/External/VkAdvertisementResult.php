<?php

namespace External;

class VkAdvertisementResult
{
    public string $targetingName;

    /**
     * @return string
     */
    public function getTargetingName(): string
    {
        return $this->targetingName;
    }

    /**
     * @param string $targetingName
     */
    public function setTargetingName(string $targetingName): void
    {
        $this->targetingName = $targetingName;
    }


}