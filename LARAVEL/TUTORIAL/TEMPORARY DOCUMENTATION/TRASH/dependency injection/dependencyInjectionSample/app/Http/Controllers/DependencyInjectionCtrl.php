<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\details;
use App\Http\Services\RegistrationServices;
class DependencyInjectionCtrl extends Controller
{
    //DEPENDENCY INJECTION
    private $registrationServices;
    public function __construct(RegistrationServices $_registrationServices){
        $this->registrationServices = $_registrationServices;
    }
    //END OF DEPENDENCY INJECTION

    public function index(){
        $details = new details();
        $details->name="visto";
        $data = $this->registrationServices->setName($details);
        dd($data);
    }
}
