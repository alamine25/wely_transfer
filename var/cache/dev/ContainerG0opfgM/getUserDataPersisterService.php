<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'App\Datapersister\UserDataPersister' shared autowired service.

include_once $this->targetDirs[3].'/vendor/api-platform/core/src/DataPersister/DataPersisterInterface.php';
include_once $this->targetDirs[3].'/src/Datapersister/UserDataPersister.php';

return $this->privates['App\\Datapersister\\UserDataPersister'] = new \App\Datapersister\UserDataPersister(($this->services['doctrine.orm.default_entity_manager'] ?? $this->load('getDoctrine_Orm_DefaultEntityManagerService.php')), ($this->services['security.password_encoder'] ?? $this->load('getSecurity_PasswordEncoderService.php')));
