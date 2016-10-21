<?php

/*
 * @package    agitation/profile-bundle
 * @link       http://github.com/agitation/profile-bundle
 * @author     Alexander Günsche
 * @license    http://opensource.org/licenses/MIT
 */

namespace Agit\ProfileBundle\Api\Controller;

use Agit\ApiBundle\Annotation\Controller\Controller;
use Agit\ApiBundle\Annotation\Depends;
use Agit\ApiBundle\Annotation\Endpoint;
use Agit\ApiBundle\Api\Controller\AbstractController;
use Agit\ProfileBundle\Api\Object\Login;
use Agit\ProfileBundle\Service\PasswordService;

/**
 * @Controller(namespace="profile.v1")
 * @Depends({"@agit.profile.password"})
 */
class Password extends AbstractController
{
    private $passwordService;

    public function __construct(PasswordService $passwordService)
    {
        $this->passwordService = $passwordService;
    }

    /**
     * @Endpoint\Endpoint(request="Login", response="common.v1/ScalarNull")
     * @Endpoint\Security(capability="")
     *
     * Initiate the “password forgotten” process.
     */
    public function reset(Login $login)
    {
        $this->passwordService->registerPasswordReset(
            $login->get("email"),
            $login->get("password")
        );
    }
}
