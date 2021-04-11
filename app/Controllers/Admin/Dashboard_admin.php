<?php

namespace App\Controllers\Admin;

use   App\Controllers\BaseController;

class Dashboard_admin extends BaseController
{
    public function dashboard_admin()
    {
        $data['title'] = "Dashboard";
        echo view('tamplates/header', $data);
        echo view('tamplates/sidebar');
        echo view('ui_admin/dashboard_admin');
        echo view('tamplates/footer');
    }
}
