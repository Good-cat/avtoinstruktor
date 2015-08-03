<?php
namespace CallMeBundle\Utils;

class CallMeSwiftMailer {
    protected $mailer;
    protected $sendFrom;
    protected $sendTo;

    public function __construct(\Swift_Mailer $mailer, $sendFrom, $sendTo) {
        $this->mailer   = $mailer;
        $this->sendFrom = $sendFrom;
        $this->sendTo   = $sendTo;
    }

    public function send($name, $phone, $message = ""){
        $message = \Swift_Message::newInstance()
            ->setSubject('Заказ обратного звонка от ' . $name . ', номер телефона: ' . $phone)
            ->setFrom($this->sendFrom)
            ->setTo($this->sendTo)
            ->setBody('Имя: ' . $name . ' Телефон: ' . $phone . ' Сообщение: ' . $message);

        if ($this->mailer->send($message)) {
            return true;
        } else {
            return false;
        }
    }
}