<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * This class contains methods for managing the developers/users of this application.
 *
 * @author  Aditya Zanjad <adityazanjad474@gmail.com>
 * @version 1.0
 * @access  public
 */
class DeveloperController extends Controller
{
    /**
     * Return a dashboard page for the developer/user
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('developers.dashboard');
    }
}
