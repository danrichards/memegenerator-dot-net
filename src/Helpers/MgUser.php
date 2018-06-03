<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class MgUser
 *
 * @method login(array $options = []) \Dan\MemeGenerator\Client
 * @method loginFacebook(array $options = []) \Dan\MemeGenerator\Client
 * @method signUp(array $options = []) \Dan\MemeGenerator\Client
 * @method updateImage(array $options = []) \Dan\MemeGenerator\Client
 * @method updateUsername(array $options = []) \Dan\MemeGenerator\Client
 */
class MgUser extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'select' => 'MgUser_Login',
        'loginFacebook' => 'MgUser_LoginFacebook',
        'signUp' => 'MgUser_SignUp',
        'updateImage' => 'MgUser_Update_Image',
        'updateUsername' => 'MgUser_Update_Username',
    ];

}