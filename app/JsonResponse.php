<?php

namespace App;

class JsonResponse
{
    private bool|string $data;

    /**
     * @param bool|string $data
     */
    public function __construct(mixed $data)
    {
        $this->data = json_encode($data);
    }

    public function getResponse(): bool|string
    {
        return $this->data;
    }
}