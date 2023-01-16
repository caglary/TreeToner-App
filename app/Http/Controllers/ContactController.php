<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CompanyRepository;

class ContactController extends Controller
{
    
   
    public function index()
    {
        $companies=$company->pluck();
        $contacts=$this->getContacts();
        return view('contacts.index',compact('contacts','companies'));
    }
    
    protected function getContacts(){
        return [
            1=>['id'=>1,'name'=>'caglar','phone'=>'98797978979'],       
            2=>['id'=>2,'name'=>'eda','phone'=>'987979797323'],
            3=>['id'=>3,'name'=>'muhammed','phone'=>'2323920380823'],
            4=>['id'=>4,'name'=>'asel','phone'=>'2323920380823'],
    
        ];
    }

    public function show($id)
    {
            $contacts=$this->getContacts();
            abort_if(!isset($contacts[$id]),404);
            $contact=$contacts[$id];
            return view('contacts.show')->with('contact',$contact);
    }

    public function create()
    {
        return view('contacts.create');
    }
}
