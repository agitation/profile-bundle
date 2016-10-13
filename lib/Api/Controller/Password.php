<?php

/*
 * @package    agitation/profile-bundle
 * @link       http://github.com/agitation/profile-bundle
 * @author     Alexander Günsche
 * @license    http://opensource.org/licenses/MIT
 */

namespace Agit\ProfileBundle\Api\Controller;

use Exception;
use Swift_Mailer;
use Swift_Message;
use Agit\ApiBundle\Annotation\Controller\Controller;
use Agit\ApiBundle\Annotation\Endpoint;
use Agit\ApiBundle\Api\Controller\AbstractController;
use Agit\ApiBundle\Api\Object\RequestObjectInterface;
use Agit\ApiBundle\Exception\BadRequestException;
use Agit\ApiBundle\Annotation\Depends;
use Agit\BaseBundle\Service\UrlService;
use Agit\IntlBundle\Tool\Translate;
use Agit\ProfileBundle\Api\Object\Login;
use Agit\ProfileBundle\Service\PasswordService;
use Agit\TriggerBundle\Service\TriggerData;
use Agit\TriggerBundle\Service\TriggerService;
use Agit\UserBundle\Service\UserService;
use Symfony\Bundle\TwigBundle\TwigEngine;

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
     * @Endpoint\Endpoint(request="Login", response="common.v1/Null")
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
