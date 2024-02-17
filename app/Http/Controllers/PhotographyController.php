<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class PhotographyController extends Controller
{
  public function index()
  {
    return Inertia::render('Public/Photography/Index');
  }
}
