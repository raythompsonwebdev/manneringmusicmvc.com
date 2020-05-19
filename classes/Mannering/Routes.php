<?php
namespace Mannering;

interface Routes
{
    public function getRoutes(): array;
    public function getAuthentication(): \Mannering\Authentication;
    public function checkPermission($permission): bool;
}
