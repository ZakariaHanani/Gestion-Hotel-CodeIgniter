<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use Config\Services;


class Contact extends BaseController
{
    public function send()
    {
        $email = \Config\Services::email();
        $from=$this->request->getPost('email');
        $subject=$this->request->getPost('sujet');
        $message=$this->request->getPost('message');
        $email->setFrom($from, 'Test');
        $email->setTo('admin@site.com');
        $email->setSubject($subject);
        $email->setMessage($message);
        if ($email->send()) {
             return redirect()->back()->with('success','Email envoyé avec succès!');
        } else {
            return redirect()->back()->with('error', "Une erreur est survenue lors envoi du mail");
        }
    }
}
