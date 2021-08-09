<?php

namespace App\Http\Controllers;


class SoccaController extends Controller
{
    function __construct()
    {
        $poste = new FonctionController();
        $poste->init();
        $statcoms = new StatuscommandeController();
        $statcoms->init();
        $statfacs = new StatusfactureController();
        $statfacs->init();
        $entites = new EntiteController();
        $entites->init();
    }

    public function index()
    {
        return view('pages.dashboard');
    }
}
