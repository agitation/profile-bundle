<?php

namespace Agit\ProfileBundle\Plugin\Api\ProfileV1\Endpoint;

use Agit\ApiBundle\Annotation\Endpoint;
use Agit\ApiBundle\Common\AbstractEndpointClass;
use Agit\ApiBundle\Common\RequestObjectInterface;
use Agit\PluggableBundle\Strategy\Depends;
use Agit\UserBundle\Exception\UnauthorizedException;
use Agit\ApiBundle\Exception\BadRequestException;

/**
 * @Endpoint\EndpointClass
 */
class Session extends AbstractEndpointClass
{
    /**
     * @Endpoint\Endpoint(request="Login",response="common.v1/Null")
     * @Endpoint\Security(capability="")
     * @Depends({"agit.user"})
     *
     * Authenticate to the Tixys server and start a session.
     */
    protected function login(RequestObjectInterface $requestObject)
    {
        try
        {
            $this->getService("agit.user")->login(
                $requestObject->get('email'),
                $requestObject->get('password')
            );
        }
        catch (UnauthorizedException $e)
        {
            throw new BadRequestException($e->getMessage());
        }
    }

    /**
     * @Endpoint\Endpoint(request="common.v1/Null",response="common.v1/Null")
     * @Endpoint\Security(capability="")
     * @Depends({"agit.user"})
     *
     * Authenticate to the Tixys server and start a session.
     */
    protected function logout()
    {
        $this->getService("agit.user")->logout();
    }
}
