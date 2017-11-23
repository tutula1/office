<?php namespace App\Http\Controllers;


class PagesController extends Controller {

	/**
	 * Display home page.
	 */
	public function index()
	{
		return view('index');
	}
	
	/**
	 * Display about page.
	 */
	public function about()
	{
		return view('about');
	}
	
	/**
	 * Display error page.
	 */
	Public function error()
	{
		return view('errors.error');
	}
	

}
