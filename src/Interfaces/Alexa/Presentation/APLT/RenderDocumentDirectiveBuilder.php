<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

abstract class RenderDocumentDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $token = null;

    /** @var TargetProfile|null */
    private $targetProfile = null;

    /** @var array */
    private $document = [];

    /** @var array */
    private $datasources = [];

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $token
     * @return self
     */
    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @param TargetProfile $targetProfile
     * @return self
     */
    public function withTargetProfile(TargetProfile $targetProfile): self
    {
        $this->targetProfile = $targetProfile;
        return $this;
    }

    /**
     * @param array $document
     * @return self
     */
    public function withDocument(array $document): self
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @param array $datasources
     * @return self
     */
    public function withDatasources(array $datasources): self
    {
        $this->datasources = $datasources;
        return $this;
    }

    public function build(): RenderDocumentDirective
    {
        return ($this->constructor)(
            $this->token,
            $this->targetProfile,
            $this->document,
            $this->datasources
        );
    }
}
