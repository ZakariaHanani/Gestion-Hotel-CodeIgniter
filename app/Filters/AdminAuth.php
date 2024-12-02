<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('email') || session()->get('role') !== 'admin' || session()->get('logged_in') !== true   ) {
            return redirect()->to('/login')->with('error', 'Access denied. Please log in as admin.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}
