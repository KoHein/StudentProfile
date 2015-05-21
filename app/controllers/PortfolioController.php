<?php 
class PortfolioController extends BaseController
{
	public function addportfolio()
	{
		if (Request::isMethod('post'))
		{
			$destinationPath = 'uploads/portfolios'; 
		    
		    $extension = Input::file('image')->getClientOriginalExtension(); 

		    $image_name = rand(11111,99999).'.'.$extension; 

			Input::file('image')->move($destinationPath, $image_name);
			
			$portfolio = new Portfolio();
			$portfolio->studentid = Input::get('studentid');
			$portfolio->name = Input::get('name');
			$portfolio->tools = Input::get('tools');
			$portfolio->image = $image_name;
 		 	
 		 	if($portfolio->save())
 		 	{
 		 		return Redirect::to('/');
 		 	}
		}
		return View::make('frontend.addportfolio');
	}
	public function deletePortfolio()
	{
		Portfolio::destroy(Input::get('id'));
		return Redirect::back();
	}
}