<?php declare(strict_types=1);

namespace DaveRandom\LibDNS\Records\ResourceData;

use DaveRandom\LibDNS\Records\ResourceData;
use DaveRandom\Network\DomainName;

final class MD implements ResourceData
{
    const TYPE_ID = 3;

    private $mailAgentName;

    public function __construct(DomainName $mailAgentName)
    {
        $this->mailAgentName = $mailAgentName;
    }

    public function getMailAgentName(): DomainName
    {
        return $this->mailAgentName;
    }

    public function getTypeId(): int
    {
        return self::TYPE_ID;
    }
}
