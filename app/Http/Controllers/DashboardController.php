<?php

namespace App\Http\Controllers;

use App\DataTables\AdminsTasksDataTable;
use App\DataTables\DeveloperTasksDataTable;

/**
 * This class contains methods for managing dashboard for different kinds of users.
 *
 * @author  Aditya Zanjad <adityazanjad474@gmail.com>
 * @version 1.0
 * @access  public
 */
class DashboardController extends Controller
{
    /**
     * Depending upon the user type return an appropriate view containing user dashboard
     *
     * @return \Illuminate\View\View;
     */
    public function index()
    {
        switch (auth()->user()->userType->id) {
            case 1:
                $dataTable = new AdminsTasksDataTable();
                return $dataTable->render('admin.dashboard');
                break;

            case 2:
                $dataTable = new DeveloperTasksDataTable();
                return $dataTable->render('tasks.index');
                break;
        }
    }
}
