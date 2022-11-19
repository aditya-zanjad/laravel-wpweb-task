<?php

namespace App\Http\Controllers;

/**
 * This class contains methods for managing the admins of this application.
 *
 * @author  Aditya Zanjad <adityazanjad474@gmail.com>
 * @version 1.0
 * @access  public
 */
class AdminController extends Controller
{
    /**
     * Return a dashboard page for the admin user
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('admins.dashboard');
    }
}
