<?php
namespace Kna\MQTransactionBundle\Model;


class Message implements MessageInterface
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $producer;
    /**
     * @var string|null
     */
    protected $contentType = null;
    /**
     * @var int|null
     */
    protected $deliveryMode = null;
    /**
     * @var string
     */
    protected $body;
    /**
     * @var string
     */
    protected $routingKey = '';
    /**
     * @var array
     */
    protected $additionalProperties = [];
    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getProducer(): ?string
    {
        return $this->producer;
    }

    /**
     * @param string|null $producer
     */
    public function setProducer(?string $producer): void
    {
        $this->producer = $producer;
    }

    /**
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    /**
     * @param string|null $contentType
     */
    public function setContentType(?string $contentType): void
    {
        $this->contentType = $contentType;
    }

    /**
     * @return int|null
     */
    public function getDeliveryMode(): ?int
    {
        return $this->deliveryMode;
    }

    /**
     * @param int|null $deliveryMode
     */
    public function setDeliveryMode(?int $deliveryMode): void
    {
        $this->deliveryMode = $deliveryMode;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getRoutingKey(): string
    {
        return $this->routingKey;
    }

    /**
     * @param string $routingKey
     */
    public function setRoutingKey(string $routingKey): void
    {
        $this->routingKey = $routingKey;
    }

    /**
     * @return array
     */
    public function getAdditionalProperties(): array
    {
        return $this->additionalProperties;
    }

    /**
     * @param array $additionalProperties
     */
    public function setAdditionalProperties(array $additionalProperties): void
    {
        $this->additionalProperties = $additionalProperties;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

}