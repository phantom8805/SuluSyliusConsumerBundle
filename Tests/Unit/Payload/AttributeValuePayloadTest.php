<?php

declare(strict_types=1);

/*
 * This file is part of Sulu.
 *
 * (c) Sulu GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\SyliusConsumerBundle\Tests\Unit\Payload;

use PHPUnit\Framework\TestCase;
use Sulu\Bundle\SyliusConsumerBundle\Common\Payload;
use Sulu\Bundle\SyliusConsumerBundle\Payload\AttributePayload;
use Sulu\Bundle\SyliusConsumerBundle\Payload\AttributeValuePayload;
use Sulu\Bundle\SyliusConsumerBundle\Tests\MockSyliusData;

class AttributeValuePayloadTest extends TestCase
{
    public function testGetCode(): void
    {
        $entity = new AttributeValuePayload(MockSyliusData::PRODUCT['attributeValues'][0]);

        $this->assertEquals(MockSyliusData::PRODUCT['attributeValues'][0]['code'], $entity->getCode());
    }

    public function testGetValue(): void
    {
        $entity = new AttributeValuePayload(MockSyliusData::PRODUCT['attributeValues'][0]);

        $this->assertEquals(MockSyliusData::PRODUCT['attributeValues'][0]['value'], $entity->getValue());
    }

    public function testGetAttribute(): void
    {
        $entity = new AttributeValuePayload(MockSyliusData::PRODUCT['attributeValues'][0]);

        $attributePayload = $entity->getAttribute();
        $this->assertInstanceOf(AttributePayload::class, $attributePayload);
        $this->assertSame(MockSyliusData::PRODUCT['attributeValues'][0]['attribute'], $attributePayload->getPayload()->getData());
    }

    public function testGetCustomData(): void
    {
        $entity = new AttributeValuePayload(MockSyliusData::PRODUCT['attributeValues'][0]);

        $customData = $entity->getCustomData();
        $this->assertInstanceOf(Payload::class, $customData);
        $this->assertSame(['test' => 1], $customData->getData());
    }

    public function testGetPayload(): void
    {
        $entity = new AttributeValuePayload(MockSyliusData::PRODUCT['attributeValues'][0]);

        $payload = $entity->getPayload();
        $this->assertInstanceOf(Payload::class, $payload);
        $this->assertSame(MockSyliusData::PRODUCT['attributeValues'][0], $payload->getData());
    }
}
