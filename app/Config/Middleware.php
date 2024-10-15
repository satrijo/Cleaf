<?php

namespace Cleaf\Config;

interface Middleware
{
    public function before($next);
}
