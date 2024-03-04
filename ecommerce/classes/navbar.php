<?php

namespace classes\navbar;

class navbar
{
    public function checkPage($pageName)
    {
        $page = basename($_SERVER['PHP_SELF']);
        if ($page === $pageName) {
            return 'active';
        }
        return null;
    }
}
