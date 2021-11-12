<?php

class LogoutController extends BaseController {
    
    protected function index () {
        $this->viewParams['logout'] = User::getLogout();
        
        $this->loadView();
    }
}