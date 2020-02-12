<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'debug.security.voter.App\Security\Voter\UserVoter' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/security-core/Authorization/Voter/VoterInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-core/Authorization/Voter/TraceableVoter.php';
include_once $this->targetDirs[3].'/vendor/symfony/security-core/Authorization/Voter/Voter.php';
include_once $this->targetDirs[3].'/src/Security/Voter/UserVoter.php';

return $this->privates['debug.security.voter.App\\Security\\Voter\\UserVoter'] = new \Symfony\Component\Security\Core\Authorization\Voter\TraceableVoter(new \App\Security\Voter\UserVoter(), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));
