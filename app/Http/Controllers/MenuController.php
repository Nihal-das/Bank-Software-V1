<?php

namespace App\Http\Controllers;

use App\Listeners\StoreNavMenu;
use App\Models\Module;
use App\Models\Permission;
use App\Models\User;
use App\Providers\AppServiceProvider;
use App\Services\NavigationService;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MenuController extends Controller
{
    public function show()
    {
        return view('components.menu');
    }

    public function updateOrder(Request $request)
    {
        if ($request->has('modules')) {
            foreach ($request->modules as $moduleId => $order) {
                Module::where('id', $moduleId)
                    ->update(['sort_order' => $order]);
            }
        }

        // Update permissions order
        if ($request->has('permissions')) {
            foreach ($request->permissions as $permissionId => $order) {
                Permission::where('id', $permissionId)
                    ->update(['sort_order' => $order]);
            }
        }


        return redirect()->back()->with('success', 'Menu order updated successfully!');
    }

    public function refresh()
    {
        session()->put(
            'nav_modules',
            app(NavigationService::class)
                ->getModulesForUser(Auth::user())
        );

        return redirect()->back()->with('success', 'Menu refreshed successfully');
    }
}
