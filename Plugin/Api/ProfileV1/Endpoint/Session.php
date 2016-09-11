<?php

/*
 * @package    agitation/profile-bundle
 * @link       http://github.com/agitation/profile-bundle
 * @author     Alexander Günsche
 * @license    http://opensource.org/licenses/MIT
 */

namespace Agit\ProfileBundle\Plugin\Api\ProfileV1\Endpoint;

use Agit\ApiBundle\Annotation\Endpoint;
use Agit\ApiBundle\Common\AbstractController;
use Agit\ApiBundle\Common\RequestObjectInterface;
use Agit\ApiBundle\Exception\BadRequestException;
use Agit\BaseBundle\Pluggable\Depends;
use Agit\UserBundle\Exception\UnauthorizedException;

/**
 * @Endpoint\Controller
 */
class Session extends AbstractController
{
    /**
     * @Endpoint\Endpoint(request="Login",response="common.v1/Null")
     * @Endpoint\Security(capability="")
     * @Depends({"@agit.user"})
     *
     * Authenticate to the Tixys server and start a session.
     */
    protected function login(RequestObjectInterface $requestObject)
    {
        try {
            $this->getService("agit.user")->login(
                $requestObject->get('email'),
                $requestObject->get('password')
            );
        } catch (UnauthorizedException $e) {
            throw new BadRequestException($e->getMessage());
        }
    }

    /**
     * @Endpoint\Endpoint(request="common.v1/Null",response="common.v1/Null")
     * @Endpoint\Security(capability="")
     * @Depends({"@agit.user"})
     *
     * Authenticate to the Tixys server and start a session.
     */
    protected function logout()
    {
        $this->getService("agit.user")->logout();
    }
}
