<?php


namespace App\Admin\Service;


use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Provider\AdminContextProvider;

final class SomeService
{
    private AdminContextProvider $adminContextProvider;

    public function __construct(AdminContextProvider $adminContextProvider)
    {
        $this->adminContextProvider = $adminContextProvider;
    }

    /**
     * @return AdminContextProvider
     */
    public function getAdminContextProvider(): AdminContextProvider
    {
        return $this->adminContextProvider;
    }

    public function getContext(): ?AdminContext
    {
        return $this->getAdminContextProvider()->getContext();
    }
}