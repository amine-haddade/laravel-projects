<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function firstAction(){
        $localname='amine';
        $tuto=['php','java','python'];
        return view("test",['name'=>$localname,'tutoriel'=>$tuto]);
    }

    public function sehello(){
        return  "hello larvel i'am amine haddade";
    }
    public function testFunction(){
        return "test test tet ";
    }
}
