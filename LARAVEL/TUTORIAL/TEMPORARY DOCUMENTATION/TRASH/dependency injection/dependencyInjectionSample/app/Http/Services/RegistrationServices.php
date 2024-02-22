<?php
namespace App\Http\Services;
class RegistrationServices{
    public function setName(details $details){
       return ['name'=>$details->name,"message"=>"This is Dependency injection"];
    }
}
class details{
    public $name;
}
