<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\Email;
use App\Models\SocialMedia;

class SettingController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}
	
	public function index()
	{
		$setting = Setting::with('companyContact', 'companyEmail', 'socialMedia')->where('company', 'self')->first();
		return view('backend.setting.index', compact('setting'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'address' => 'required|string',
			'registrationNumber' => 'required|string',
			'phoneNumberCompany.*' => 'required|string',
			'phoneNumberAdvertisement.*' => 'required|string',
			'emailCompany.*' => 'required|string',
			'emailAdvertisement.*' => 'required|string',
			'socialMediaIcon.*' => 'required|string',
			'socialMediaLink.*' => 'required|string',
			'googleMap' => 'required',
		]);

		try
    {
			$setting = Setting::where('company', 'self')->first();

	    if( $setting == null ){
	    	$setting = new Setting();
	    	$setting->company = 'self';
		    $setting->address = $request['address'];
		    $setting->registration_number = $request['registrationNumber'];
		    $setting->google_map = $request['googleMap'];
		    $setting->executive_publisher = $request['executivePublisher'];
		    $setting->executive_editor = $request['executiveEditor'];
		    $setting->youtube_link = $request['youtubeLink'];
				$setting->save();
				
		    $countPhoneNumberCompany = count($request['phoneNumberCompany']);
		    for ($i = 0; $i < $countPhoneNumberCompany; $i++){
		    	$contact = new Contact();
		    	$contact->settings_id = $setting->id;
		    	$contact->section = 'company';
		    	$contact->contact_number = $request['phoneNumberCompany'][$i];
		    	$contact->save();
				}
				
				$countPhoneNumberAdvertisement = count($request['phoneNumberAdvertisement']);
		    for ($i = 0; $i < $countPhoneNumberAdvertisement; $i++){
		    	$contact = new Contact();
		    	$contact->settings_id = $setting->id;
		    	$contact->section = 'advertisement';
		    	$contact->contact_number = $request['phoneNumberAdvertisement'][$i];
		    	$contact->save();
		    }

				$countEmailCompany = count($request['emailCompany']);
		    for ($i = 0; $i < $countEmailCompany; $i++){
		    	$email = new Email();
					$email->settings_id = $setting->id;
					$email->section = 'company';
		    	$email->email = $request['emailCompany'][$i];
		    	$email->save();
				}

				$countEmailAdvertisement = count($request['emailAdvertisement']);
		    for ($i = 0; $i < $countEmailAdvertisement; $i++){
		    	$email = new Email();
					$email->settings_id = $setting->id;
					$email->section = 'advertisement';
		    	$email->email = $request['emailAdvertisement'][$i];
		    	$email->save();
				}
				
				$countSocialMediaIcon = count($request['socialMediaIcon']);
				for ($i = 0; $i < $countSocialMediaIcon; $i++){
					$socialMedia = new SocialMedia();
					$socialMedia->settings_id = $setting->id;
					$socialMedia->name = $request['socialMediaName'][$i];
					$socialMedia->social_media_icon = $request['socialMediaIcon'][$i];
					$socialMedia->social_media_link = $request['socialMediaLink'][$i];
					$socialMedia->save();
				}

	    }
	    else{
		    $setting->address = $request['address'];
		    $setting->registration_number = $request['registrationNumber'];
		    $setting->google_map = $request['googleMap'];
				$setting->executive_publisher = $request['executivePublisher'];
		    $setting->executive_editor = $request['executiveEditor'];
		    $setting->youtube_link = $request['youtubeLink'];
				$setting->update();

		    $countPhoneNumberCompany = count($request['phoneNumberCompany']);
		    Contact::where('settings_id', '=', $setting->id)->where('section', 'company')->delete();
		    for( $i = 0; $i < $countPhoneNumberCompany; $i++ ){
		    	$contact = new Contact();
					$contact->settings_id = $setting->id;
					$contact->section = 'company';
		    	$contact->contact_number = $request['phoneNumberCompany'][$i];
		    	$contact->save();
				}
				
				$countPhoneNumberAdvertisement = count($request['phoneNumberAdvertisement']);
		    Contact::where('settings_id', '=', $setting->id)->where('section', 'advertisement')->delete();
		    for( $i = 0; $i < $countPhoneNumberAdvertisement; $i++ ){
		    	$contact = new Contact();
					$contact->settings_id = $setting->id;
					$contact->section = 'advertisement';
		    	$contact->contact_number = $request['phoneNumberAdvertisement'][$i];
		    	$contact->save();
		    }

				$countEmailCompany = count($request['emailCompany']);
		    Email::where('settings_id', $setting->id)->where('section', 'company')->delete();
		    for( $i = 0; $i < $countEmailCompany; $i++ ){
		    	$email = new Email();
					$email->settings_id = $setting->id;
					$email->section = 'company';
		    	$email->email = $request['emailCompany'][$i];
		    	$email->save();
				}
				
				$countEmailAdvertisement = count($request['emailAdvertisement']);
		    Email::where('settings_id', $setting->id)->where('section', 'advertisement')->delete();
		    for( $i = 0; $i < $countEmailAdvertisement; $i++ ){
		    	$email = new Email();
					$email->settings_id = $setting->id;
					$email->section = 'advertisement';
		    	$email->email = $request['emailAdvertisement'][$i];
		    	$email->save();
		    }

				$countSocialMediaIcon = count($request['socialMediaIcon']);
				SocialMedia::where('settings_id', $setting->id)->delete();
				for ($i = 0; $i < $countSocialMediaIcon; $i++){
					$socialMedia = new SocialMedia();
					$socialMedia->settings_id = $setting->id;
					$socialMedia->name = $request['socialMediaName'][$i];
					$socialMedia->social_media_icon = $request['socialMediaIcon'][$i];
					$socialMedia->social_media_link = $request['socialMediaLink'][$i];
					$socialMedia->save();
				}

	    }
	  }
	  catch(\Exception $e){
	  	request()->session()->flash('unsuccessMessage', 'Failed to update setting !!!');
	    return redirect()->back();
	  }
    
    request()->session()->flash('successMessage', 'Settings updated successfully !!!');
    return redirect()->route('backend.setting.index');
	}
}
