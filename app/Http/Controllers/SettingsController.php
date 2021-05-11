<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Auth;
use Carbon\Carbon;

class SettingsController extends Controller
{
    // liste parametre
	public function index(){

		$settings = Setting::all();
		$title = "Paramètres du système";
		$activeMain = "parameters";
		return view('backend.'.Auth()->user()->role.'.settings.index', compact('title', 'settings', 'activeMain'));
	}

	public function update(Request $request)
	{
		$title = "Paramètres du système";
		$activeMain = "parameters";

		foreach($_POST as $key => $value){
			if($key == "_token"){
				continue;
			}

			$data = array();
			$data['value'] = $value; 
			$data['updated_at'] = Carbon::now();
			if(Setting::where('code', $key)->exists()){				
				Setting::where('code','=',$key)->update($data);			
			}else{
				$data['code'] = $key; 
				$data['created_at'] = Carbon::now();
				Setting::insert($data); 
			}
		}

		$messageSuccess = "Les paramètres du système ont été mis à jour avec succès.";
		return redirect()->action('SettingsController@index')->with('messageSuccess', $messageSuccess);
	}


	public function update_logo(Request $request)
	{
		$this->validate($request, [
			'favicon' => 'image|mimes:jpeg,png,jpg|max:2048',
			'logo' => 'image|mimes:jpeg,png,jpg|max:2048'
		]);

		$active = "parameters";

		$logo = $request->file('logo');

		if(($request->file('logo')!= null) && $logo->isValid())
		{
			$chemin = 'uploads/settings';
			$extension = $logo->getClientOriginalExtension();
			$nom = 'logo_' . time() .'.' . $extension;

			if($logo->move($chemin, $nom)) 
			{
				$data = array();
				$data['value'] = $chemin . '/' . $nom;
				$data['updated_at'] = Carbon::now();

				

				if(Setting::where('code', 'logo')->exists()){				
					Setting::where('code','=','logo')->update($data);			
				}else{
					
					$data['code'] = 'logo'; 
					$data['created_at'] = Carbon::now();
					Setting::insert($data); 
				}
			}
		}

		$favicon = $request->file('favicon');

		if(($request->file('favicon')!= null) && $favicon->isValid())
		{
			$chemin = 'uploads/settings';
			$extension = $favicon->getClientOriginalExtension();
			$nom = 'favicon_' . time() . '.' . $extension;

			if($favicon->move($chemin, $nom)) 
			{
				$data1 = array();
				$data1['value'] = $chemin . '/' . $nom;
				$data1['updated_at'] = Carbon::now();

				if(Setting::where('code', 'favicon')->exists()){				
					Setting::where('code','=','favicon')->update($data1);			
				}else{
					
					$data1['code'] = 'favicon'; 
					$data1['created_at'] = Carbon::now();
					Setting::insert($data1); 
				}
			}
		}

		$avatar = $request->file('default_avatar');

		if(($request->file('default_avatar')!= null) && $avatar->isValid())
		{
			$chemin = 'uploads/settings';
			$extension = $avatar->getClientOriginalExtension();
			$nom = 'avatar_' . time() . '.' . $extension;

			if($avatar->move($chemin, $nom)) 
			{
				$av = array();
				$av['value'] = $chemin . '/' . $nom;
				$av['updated_at'] = Carbon::now();

				if(Setting::where('code', 'default_avatar')->exists()){				
					Setting::where('code','=','default_avatar')->update($av);			
				}else{
					
					$av['code'] = 'default_avatar'; 
					$av['created_at'] = Carbon::now();
					Setting::insert($av); 
				}
			}
		}

		$bg = $request->file('default_bg');

		if(($request->file('default_bg')!= null) && $bg->isValid())
		{
			$chemin = 'uploads/settings';
			$extension = $bg->getClientOriginalExtension();
			$nom = 'default_bg_' . time() . '.' . $extension;

			if($bg->move($chemin, $nom)) 
			{
				$bgimg = array();
				$bgimg['value'] = $chemin . '/' . $nom;
				$bgimg['updated_at'] = Carbon::now();

				if(Setting::where('code', 'default_bg')->exists()){				
					Setting::where('code','=','default_bg')->update($bgimg);			
				}else{
					
					$bgimg['code'] = 'default_bg'; 
					$bgimg['created_at'] = Carbon::now();
					Setting::insert($bgimg); 
				}
			}
		}


		$messageSuccess = "Les paramètres du système ont été mis à jour avec succès.";
		return redirect()->action('SettingsController@index')->with('messageSuccess', $messageSuccess);

	}
}
