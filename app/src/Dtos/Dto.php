<?php

namespace Gabriel\SistemaProvas\Dtos;

use JsonSerializable;

class Dto implements JsonSerializable
{
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}