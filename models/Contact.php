<?php

namespace app\models;

use app\models\User;

class States
{
    public static function statelist() {
        return array('AL'=>"Alabama",  
                'AK'=>"Alaska",  
                'AZ'=>"Arizona",  
                'AR'=>"Arkansas",  
                'CA'=>"California",  
                'CO'=>"Colorado",  
                'CT'=>"Connecticut",  
                'DE'=>"Delaware",  
                'DC'=>"District Of Columbia",  
                'FL'=>"Florida",  
                'GA'=>"Georgia",  
                'HI'=>"Hawaii",  
                'ID'=>"Idaho",  
                'IL'=>"Illinois",  
                'IN'=>"Indiana",  
                'IA'=>"Iowa",  
                'KS'=>"Kansas",  
                'KY'=>"Kentucky",  
                'LA'=>"Louisiana",  
                'ME'=>"Maine",  
                'MD'=>"Maryland",  
                'MA'=>"Massachusetts",  
                'MI'=>"Michigan",  
                'MN'=>"Minnesota",  
                'MS'=>"Mississippi",  
                'MO'=>"Missouri",  
                'MT'=>"Montana",
                'NE'=>"Nebraska",
                'NV'=>"Nevada",
                'NH'=>"New Hampshire",
                'NJ'=>"New Jersey",
                'NM'=>"New Mexico",
                'NY'=>"New York",
                'NC'=>"North Carolina",
                'ND'=>"North Dakota",
                'OH'=>"Ohio",  
                'OK'=>"Oklahoma",  
                'OR'=>"Oregon",  
                'PA'=>"Pennsylvania",  
                'RI'=>"Rhode Island",  
                'SC'=>"South Carolina",  
                'SD'=>"South Dakota",
                'TN'=>"Tennessee",  
                'TX'=>"Texas",  
                'UT'=>"Utah",  
                'VT'=>"Vermont",  
                'VA'=>"Virginia",  
                'WA'=>"Washington",  
                'WV'=>"West Virginia",  
                'WI'=>"Wisconsin",  
                'WY'=>"Wyoming");
    }

    public static function abbreviations() {
        return array_keys(self::statelist());
    }
}

class Contact extends \lithium\data\Model {

    protected $_meta = array(
                'name' => null,
                'title' => null,
                'class' => null,
                'source' => 'contacts',
                'connection' => 'default'
   );

    public $belongsTo = array('User');

	public $validates = array(
        'name' => array(
            array('notEmpty', 'message' => 'Name is required'),
        ),
        'street_address' => array(
            array('notEmpty', 
                'message' => 'Street address is required'),
        ),
        'city' => array(
            array('notEmpty',
                'message' => 'City is required'),
        ),
        'state' => array(
            array('alphaNumeric',
                'message' => 'State must be in the list'),
        ),
        'zip' => array(
            array('postalCode')
        ),
        'phone' => array(
            array('phone')
        ),
    );

    public static function stateOptions() {
        return States::stateList();
    }        
}

Contact::applyFilter('save', function($self, $params, $chain){
    $record = $params['entity'];

    if (isset($record->id)){
        unset($params['data']['user_id']);
    } else {
        $params['data']['user_id'] = User::current()->id;
    }

    return $chain->next($self, $params, $chain);
});

?>
