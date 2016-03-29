<?php

namespace Agit\ProfileBundle\Plugin\Api\ProfileV1\Endpoint;

use Agit\ApiBundle\Annotation\Endpoint;
use Agit\ApiBundle\Common\AbstractEndpointClass;
use Agit\ApiBundle\Common\AbstractObject;
use Agit\PluggableBundle\Strategy\Depends;

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
    protected function login(AbstractObject $requestObject)
    {
        $this->getService("agit.user")->login(
            $requestObject->get('email'),
            $requestObject->get('password')
        );
    }

    /**
     * @Endpoint\Endpoint(request="common.v1/Null",response="common.v1/Null")
     * @Endpoint\Security(capability="")
     * @Depends({"agit.user"})
     *
     * Authenticate to the Tixys server and start a session.
     */
    protected function logout(AbstractObject $requestObject)
    {
        $this->getService("agit.user")->logout();
    }
}
