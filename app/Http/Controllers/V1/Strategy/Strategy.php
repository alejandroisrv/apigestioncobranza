<?php


namespace App\Http\Controllers\V1\Strategy;




use Laravel\Lumen\Http\Request;

interface Strategy {
    public function getItems(Request $request);
    public function addItem(Request $request);
}
