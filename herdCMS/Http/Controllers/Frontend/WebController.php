<?php

namespace HerdCMS\Http\Controllers\Frontend;

class WebController extends FrontendController
{
    public function index(){
        $rrr = "sdfdsf";
        return view('thems.herd_pages.index',compact('rrr'));
    }

}
