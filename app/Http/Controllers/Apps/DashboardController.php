<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
  private UserService $user_service;

  public function __construct()
  {
    $this->user_service = new UserService;
  }

  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    $products = Product::get();

    $capital = 0;
    $sell = 0;

    foreach ($products as $product ) {
      $capital += $product->product_price_capital;
      $sell += $product->product_price_sell;
    }

    $laba_bersih = $sell - $capital;

    $data = [
      "admin_online" => $this->user_service->get_admin_online(),
      "total_product" => product::count(),
      "laba_bersih" => $laba_bersih 
    ];

    return $this->view_admin("admin.index", "Dashboard", $data, TRUE);
  }
}
