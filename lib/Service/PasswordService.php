<?php
declare(strict_types=1);
/*
 * @package    agitation/profile-bundle
 * @link       http://github.com/agitation/profile-bundle
 * @author     Alexander Günsche
 * @license    http://opensource.org/licenses/MIT
 */

namespace Agit\ProfileBundle\Service;

use Agit\IntlBundle\Tool\Translate;
use Agit\PageBundle\Service\PageService;
use Agit\TriggerBundle\Service\TriggerData;
use Agit\TriggerBundle\Service\TriggerEvent;
use Agit\TriggerBundle\Service\TriggerService;
use Agit\UserBundle\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Swift_Mailer;
use Swift_Message;
use Symfony\Bundle\TwigBundle\TwigEngine;

class PasswordService
{
    const TRIGGER_TAG = 'profile.pass.reset';

    private $entityManager;

    private $userService;

    private $mailerService;

    private $triggerService;

    private $templatingService;

    private $pageService;

    private $mailFrom;

    private $mailReplyto;

    public function __construct(
        EntityManagerInterface $entityManager,
        UserService $userService,
        Swift_Mailer $mailerService,
        TwigEngine $templatingService,
        TriggerService $triggerService,
        PageService $pageService,
        $mailFrom,
        $mailReplyto
    ) {
        $this->entityManager = $entityManager;
        $this->userService = $userService;
        $this->pageService = $pageService;
        $this->mailerService = $mailerService;
        $this->templatingService = $templatingService;
        $this->triggerService = $triggerService;
        $this->mailFrom = $mailFrom;
        $this->mailReplyto = $mailReplyto;
    }

    public function registerPasswordReset($email, $password)
    {
        $user = $this->userService->getUser($email);
        $encPass = $this->userService->encodePassword($user, $password);

        $message = Swift_Message::newInstance()
            ->setSubject(Translate::t('Password reset'))
            ->setFrom([$this->mailFrom => 'Customer Service'])
            ->setReplyTo([$this->mailReplyto => 'Customer Service'])
            ->setTo([$user->getEmail() => $user->getName()]);

        $trigger = new TriggerData(['id' => $user->getId(), 'encPass' => $encPass]);
        $token = $this->triggerService->createTrigger(self::TRIGGER_TAG, $trigger);

        $message->setBody($this->templatingService->render(
            'AgitProfileBundle:Mail:passreset.txt.twig',
            [
                'name' => $user->getName(),
                'url' => $this->pageService->createUrl('/user/newpass') . "#!/confirm?$token"
            ]
        ), 'text/plain');

        $this->mailerService->send($message);
    }

    public function updatePassword(TriggerEvent $event)
    {
        $data = $event->getData();
        $user = $this->userService->getUser($data['id']);
        $user->setPassword($data['encPass']);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
