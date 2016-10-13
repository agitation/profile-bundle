<?php

/*
 * @package    agitation/profile-bundle
 * @link       http://github.com/agitation/profile-bundle
 * @author     Alexander Günsche
 * @license    http://opensource.org/licenses/MIT
 */

namespace Agit\ProfileBundle\Api\Object;

use Agit\ApiBundle\Annotation\Object\Object;
use Agit\ApiBundle\Annotation\Property;
use Agit\ApiBundle\Api\Object\AbstractRequestObject;

/**
 * @Object(namespace="profile.v1")
 *
 * Login credentials.
 */
class PasswordReset extends AbstractRequestObject
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
