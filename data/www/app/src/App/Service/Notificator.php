<?php

namespace App\Service;

use Beaver\Request\Request;

class Notificator
{
    const NOTIFICATIONS_SESSION_KEY = 'notifications';

    /** @var Request  */
    private $request;

    /**
     * Notificator constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Add a notification to the notifications stack
     *
     * @param string $message
     * @param string $type
     */
    public function addNotification(string $message, string $type)
    {
        $notifications = $this->request->getSessionValue(self::NOTIFICATIONS_SESSION_KEY);

        if (!$notifications) {
            $notifications = [];
        }

        $notifications[] = [
            'type'    => $type,
            'message' => $message,
        ];

        $this->request->setSessionValue(self::NOTIFICATIONS_SESSION_KEY, $notifications);
    }

    /**
     * Return the list of notifications and delete it from the session
     *
     * @return object
     */
    public function getNotifications()
    {
        $notifications = $this->request->getSessionValue(self::NOTIFICATIONS_SESSION_KEY);
        $this->request->unsetSessionValue(self::NOTIFICATIONS_SESSION_KEY);
        return $notifications;
    }
}
