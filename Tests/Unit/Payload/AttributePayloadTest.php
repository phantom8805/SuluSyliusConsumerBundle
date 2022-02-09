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
use Sulu\Bundle\SyliusConsumerBundle\Tests\MockSyliusData;

class AttributePayloadTest extends TestCase
{
    public function testGetId(): void
    {
        $entity = new AttributePayload(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['id'], MockSyliusData::PRODUCT['attributeValues'][0]['attribute']);

        $this->assertEquals(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['id'], $entity->getId());
    }

    public function testGetCode(): void
    {
        $entity = new AttributePayload(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['id'], MockSyliusData::PRODUCT['attributeValues'][0]['attribute']);

        $this->assertEquals(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['code'], $entity->getCode());
    }

    public function testGetType(): void
    {
        $entity = new AttributePayload(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['id'], MockSyliusData::PRODUCT['attributeValues'][0]['attribute']);

        $this->assertEquals(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['type'], $entity->getType());
    }

    public function testGetTranslations(): void
    {
        $entity = new AttributePayload(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['id'], MockSyliusData::PRODUCT['attributeValues'][0]['attribute']);

        $translations = $entity->getTranslations();
        $this->assertCount(1, $translations);

        $this->assertEquals(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['translations'][0], $translations['de']->getPayload()->getData());
    }

    public function testGetConfiguration(): void
    {
        $entity = new AttributePayload(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['id'], MockSyliusData::PRODUCT['attributeValues'][0]['attribute']);

        $customData = $entity->getConfiguration();
        $this->assertInstanceOf(Payload::class, $customData);
        $this->assertSame(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['configuration'], $customData->getData());
    }

    public function testGetCustomData(): void
    {
        $entity = new AttributePayload(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['id'], MockSyliusData::PRODUCT['attributeValues'][0]['attribute']);

        $customData = $entity->getCustomData();
        $this->assertInstanceOf(Payload::class, $customData);
        $this->assertSame(['test' => 1], $customData->getData());
    }

    public function testGetPayload(): void
    {
        $entity = new AttributePayload(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['id'], MockSyliusData::PRODUCT['attributeValues'][0]['attribute']);

        $payload = $entity->getPayload();
        $this->assertInstanceOf(Payload::class, $payload);
        $this->assertSame(MockSyliusData::PRODUCT['attributeValues'][0]['attribute'], $payload->getData());
    }
}
