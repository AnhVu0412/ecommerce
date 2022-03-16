<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public $data = [];
  function index(){
        $this -> data['welcome'] = 'Template Blade';
        $this ->data['content'] = '<h3>Template Blade</h3>
                                   <p>ITD </p>
                                   <p>ITDragons</p>';
        $this ->data['index'] = '1';

        $this ->data['dataArr'] = [
          'Item 1',
          'Item 2',
          'Item 3'
        ];
      return view('test',$this ->data);
  }
}
