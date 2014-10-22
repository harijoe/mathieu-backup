<?php

namespace Ardemis\MainBundle\Security;


use Ardemis\UserBundle\Entity\Repository\UserRepository;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Ardemis\UserBundle\Entity\User as UserFromDatabase;

/**
 * Class ApiKeyUserProvider
 */
class ApiKeyUserProvider implements UserProviderInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var UserFromDatabase
     */
    private $userFromDatabase;


    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $apiKey
     *
     * @return string
     */
    public function getUsernameForApiKey($apiKey)
    {
        $this->userFromDatabase = $this->userRepository->findOneBy(['apiKey' => $apiKey]);

        if (!$this->userFromDatabase) {
            throw new BadCredentialsException('User not found');
        }

        if (!in_array("ROLE_API", $this->getRoles())) {
            throw new BadCredentialsException('Role API not found');
        }

        return $this->userFromDatabase->getUsername();
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->userFromDatabase->getRoles();
    }

    /**
     * Loads the user for the given username.
     *
     * This method must throw UsernameNotFoundException if the user is not
     * found.
     *
     * @param string $username The username
     *
     * @return UserInterface
     *
     * @see UsernameNotFoundException
     *
     * @throws UsernameNotFoundException if the user is not found
     *
     */
    public function loadUserByUsername($username)
    {
        return new User(
            $username,
            null,
            $this->getRoles()
        );
    }

    /**
     * Refreshes the user for the account interface.
     *
     * It is up to the implementation to decide if the user data should be
     * totally reloaded (e.g. from the database), or if the UserInterface
     * object can just be merged into some internal array of users / identity
     * map.
     *
     * @param UserInterface $user
     *
     * @return UserInterface
     *
     * @throws UnsupportedUserException if the account is not supported
     */
    public function refreshUser(UserInterface $user)
    {
        throw new UnsupportedUserException();
    }

    /**
     * Whether this provider supports the given user class
     *
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class)
    {
        return 'Symfony\Component\Security\Core\User\User' === $class;
    }
}
