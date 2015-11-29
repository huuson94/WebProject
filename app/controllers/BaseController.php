<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
    
    
    public function __construct() {
        $privacies = Privacy::where('is_deleted',0)->get();
        return View::share('privacies',$privacies);
    }
}
