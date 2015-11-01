<?php
namespace gitView;

use vcsCommon\BaseRepository;
use vcsCommon\exception\CommonException;
use vcsCommon\exception\RepositoryException;

/**
 * Repository class
 * Provides access control to project repository
 */
class Repository extends BaseRepository
{
    /**
     * Check repository status and returns it.
     *
     * @return string
     * @throws RepositoryException
     */
    public function checkStatus()
    {
        try {
            $result = $this->wrapper->execute(['status', '--short'], $this->projectPath);
        } catch (CommonException $ex) {
            throw new RepositoryException("Can't get repository status", $ex->getCode(), $ex);
        }
        return $result;
    }
}