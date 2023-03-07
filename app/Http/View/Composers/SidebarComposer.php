<?php
	/**
	 * Created by PhpStorm.
	 * User: S.Ahmet BALCI
	 * Date: 7.03.2023
	 * Time: 11:46
	 */

	namespace App\Http\View\Composers;

	use App\Main\SidebarPanel;
	use Illuminate\View\View;

	class SidebarComposer
	{
		public function compose(View $view)
		{
			if (!is_null(request()->route())) {
				$pageName = request()->route()->getName();
				$routePrefix = explode('/', $pageName)[0] ?? '';

				switch ($routePrefix) {
					case 'elements':
						$view->with('sidebarMenu', SidebarPanel::elements());
						break;
					case 'components':
						$view->with('sidebarMenu', SidebarPanel::components());
						break;
					case 'forms':
						$view->with('sidebarMenu', SidebarPanel::forms());
						break;
					case 'layouts':
						$view->with('sidebarMenu', SidebarPanel::layouts());
						break;
					case 'apps':
						$view->with('sidebarMenu', SidebarPanel::apps());
						break;
					case 'dashboards':
						$view->with('sidebarMenu', SidebarPanel::dashboards());
						break;
					default:
						$view->with('sidebarMenu', SidebarPanel::dashboards());
				}

				$view->with('allSidebarItems', SidebarPanel::all());
				$view->with('pageName', $pageName);
				$view->with('routePrefix', $routePrefix);
			}
		}
	}