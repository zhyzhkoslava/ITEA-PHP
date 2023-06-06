<?php

use src\DbInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class Application
{
    protected $db;
    protected $logger;

    public function __construct(DbInterface $db, LoggerInterface $logger)
    {
        $this->db = $db;
        $this->logger = $logger;
    }

    public function run()
    {
        $this->db->select();

        $this->logger->log(LogLevel::DEBUG, 'Application is running');

        try {
            throw new \Exception('App is broken');
        } catch (\Throwable $exception) {
            $this->logger->log(LogLevel::ERROR, $exception->getMessage());
        }
    }
}