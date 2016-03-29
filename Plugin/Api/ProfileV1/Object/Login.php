<?php

namespace Agit\ProfileBundle\Plugin\Api\ProfileV1\Object;

use Agit\ApiBundle\Annotation\Object;
use Agit\ApiBundle\Annotation\Property;
use Agit\ApiBundle\Common\AbstractObject;

/**
 * @Object\Object
 *
 * Login credentials.
 */
class Login extends AbstractObject
{
    /**
     * @Property\StringType
     *
     * The user’s name (i.e. e-mail address)
     */
    public $email;

    /**
     * @Property\StringType
     *
     * The password
     */
    public $password;
}
