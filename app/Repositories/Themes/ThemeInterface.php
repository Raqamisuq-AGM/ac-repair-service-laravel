<?php

namespace App\Repositories\Themes;

interface ThemeInterface
{
    public function getAllTheme();
    public function install($data);
    public function activate($id);
    public function delete($id);
    public function verifyTheme($id);
}
