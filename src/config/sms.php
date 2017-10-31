<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default SMS Gateway
    |--------------------------------------------------------------------------
    |
    | The Default SMS gateway name
	| Example : "smsgw.net" , "mobily.ws" or any other you define here
	| You can override the default gateway at request
    |
    */
    'default' => 'smsgw.net',
    /*
    |--------------------------------------------------------------------------
    | SMS Gateway Setup
    |--------------------------------------------------------------------------
    |
    | Here you may configure the gateway setup which includes the API links,
    | parameters, method (get, post) .
    | And setup the account credentials 
    |
    */
    'gateways' => [
        'mobily.ws' => [
            'method' => 'post',
            'senderParameter' => 'sender',
            'messageParameter' => 'msg',
            'userParameter' => 'mobile',
            'passwordParameter' => 'password',
            'recipientsParameter' => 'numbers',
            'successCode' => '1',
            'dateFormat' => 'm/d/Y',
            'dateParameter' => 'dateSend',
            'timeFormat' => 'H:i:s',
            'timeParameter' => 'timeSend',
            'numbersSeparator' => ',',
            'parameters' => [
                'sender' => '', // Mobily.ws Sender Name
                'mobile' => '', // Mobily.ws Account Mobile (Username)
                'password' => '', // Mobily.ws Password
                'deleteKey' => 90,
                'resultType' => 1,
                'viewResult' => 1,
                'MsgID' => rand(00000, 99999),
                'applicationType' => '68',
                'lang' => 3
            ],
            'links' => [
                'getCredit' => 'http://www.mobily.ws/api/balance.php',
                'sendBulk' => 'http://www.mobily.ws/api/msgSend.php'
            ],
        ],
        'smsgw.net' => [
            'method' => 'post',
            'senderParameter' => 'strTagName',
            'messageParameter' => 'strMessage',
            'userParameter' => 'strUserName',
            'passwordParameter' => 'strPassword',
            'recipientsParameter' => 'strRecepientNumbers',
            'successCode' => '1',
            'dateTimeFormat' => 'YmdHi',
            'dateTimeParameter' => 'sendDateTime',
            'numbersSeparator' => ';',
            'parameters' => [
                'strUserName' => '', // smsgw.net Sender Name
                'strPassword' => '', // smsgw.net Password
                'strTagName' => '',  // smsgw.net Tag Name
            ],
            'links' => [
                'getCredit' => 'http://api.smsgw.net/GetCredit',
                'sendBulk' => 'http://api.smsgw.net/SendBulkSMS'
            ],
        ],
    ],
];