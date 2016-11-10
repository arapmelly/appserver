<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;



	protected $primaryKey = 'id';

	protected $username = 'username';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	public static function signup($input)
    {

        
        //Session::set('organization', $org);

        $client = new \GuzzleHttp\Client();

        $response = $client->get('http://localhost/core/public/organization');

        $org = $response->getBody()->getContents();

        

       $r = $client->post(
    'http://localhost/core/public/saccoclients/appadd',
    array(
        'json' => array(
            
            'name' => array_get($input, 'name'),
            'id_number' => array_get($input, 'idnumber'),
            'phone' => array_get($input, 'phone'),
            'organization_id' => $org[7]
        )
    )
);

      

        $id = $r->getBody();

        $user_id = DB::table('users')->insertGetId([
            'username' => array_get($input, 'idnumber'),
            'phone' => array_get($input, 'phone'),
            'password' => Hash::make(array_get($input, 'password')),
            'client_id' => $id

            ]
        );

          
        $user = User::find($user_id);

        return $user;
    }



    


}
