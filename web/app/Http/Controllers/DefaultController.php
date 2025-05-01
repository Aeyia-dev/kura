<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class DefaultController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Inertia\Response
     */
    public function home()
    {
        return Inertia::render('Landing', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    /**
     * Display the holding page.
     *
     * @return \Illuminate\View\View
     */
    public function holding()
    {
        return Inertia::render('Holding');
    }

    /**
     * Display the society page.
     *
     * @return \Inertia\Response
     */
    public function society()
    {
        return Inertia::render('Society');
    }

    /**
     * Display the dashboard.
     *
     * @return \Inertia\Response
     */
    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }

    /**
     * Display the email signatures page.
     *
     * @return \Inertia\Response
     */
    public function emailSignatures()
    {
        return Inertia::render('EmailSignaturesIframe');
    }

    /**
     * Display the email signatures popup.
     *
     * @return \Illuminate\View\View
     */
    public function emailSignaturesPopup()
    {
        return view('email-signatures');
    }
}