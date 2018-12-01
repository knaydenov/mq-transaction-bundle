<?php
namespace Kna\MQTransactionBundle\Model;


interface MessageInterface
{
    /**
     * @return string|null
     */
    public function getProducer(): ?string;

    /**
     * @param string|null $producer
     */
    public function setProducer(?string $producer): void;

    /**
     * @return string|null
     */
    public function getContentType(): ?string;

    /**
     * @param string|null $contentType
     */
    public function setContentType(?string $contentType): void;

    /**
     * @return int|null
     */
    public function getDeliveryMode(): ?int;

    /**
     * @param int|null $deliveryMode
     */
    public function setDeliveryMode(?int $deliveryMode): void;

    /**
     * @return string
     */
    public function getBody(): string;

    /**
     * @param string $body
     */
    public function setBody(string $body): void;

    /**
     * @return string
     */
    public function getRoutingKey(): string;

    /**
     * @param string $routingKey
     */
    public function setRoutingKey(string $routingKey): void;

    /**
     * @return array
     */
    public function getAdditionalProperties(): array;

    /**
     * @param array $additionalProperties
     */
    public function setAdditionalProperties(array $additionalProperties): void;

    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void;
}