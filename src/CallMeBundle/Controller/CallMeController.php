<?php

namespace CallMeBundle\Controller;

use CallMeBundle\Form\Type\CallMeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CallMeController extends Controller{

    public function getCallMeFormAction()
    {
        $callMeForm = $this->createForm(new CallMeType());
        return $this->render('CallMeBundle::_callme.html.twig', array(
            'callMeForm' => $callMeForm->createView()
        ));
    }

    public function callMeAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $callMeForm = $this->createForm(new CallMeType());
            $callMeForm->handleRequest($request);
            if ($callMeForm->isValid()){
                $name = $callMeForm->get('name')->getData();
                $phone = $callMeForm->get('phone')->getData();
                $message = $callMeForm->get('message')->getData() ? : "Сообщение отсутствует";
                $callme = $this->get($this->container->getParameter('call_me_service'));
                if ($callme->send($name, $phone, $message)) {
                    return new Response('Данные успешно отправлены, наш менеджер перезвонит Вам в ближайшее время.');
                } else {
                    return new Response('Ошибка при отправке данных, проверьте соединение с Интернетом или повторите попытку позже.');
                }
            } else {
                return new Response('Поля Имя и Телефон являются обязательными для заполнения!');
            }

        }
    }
} 