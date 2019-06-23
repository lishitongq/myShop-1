<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Tools\Tools;
use App\Http\Model\Goods;
use App\Http\Model\Cart;
class BasicController extends Controller
{
	public $tools;
	public $goods_table;
	public $cart_table;
    public function __construct(Tools $tools,Goods $goods,Cart $cart){
    	$this->tools = $tools;
    	$this->cart_table = $cart;
    	$this->goods_table = $goods;
    }
}
