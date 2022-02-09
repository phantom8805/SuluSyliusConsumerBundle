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
use Sulu\Bundle\SyliusConsumerBundle\Payload\AttributeTranslationPayload;
use Sulu\Bundle\SyliusConsumerBundle\Tests\MockSyliusData;
use Sulu\Component\Localization\Localization;

class AttributeTranslationPayloadTest extends TestCase
{
    public function testGetLocale(): void
    {
        $entity = new AttributeTranslationPayload(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['translations'][0]);

        $this->assertEquals(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['translations'][0]['locale'], $entity->getLocale());
    }

    public function testGetLocalization(): void
    {
        $entity = new AttributeTranslationPayload(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['translations'][0]);

        $this->assertInstanceOf(Localization::class, $entity->getLocalization());
        $this->assertEquals(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['translations'][0]['locale'], $entity->getLocalization()->getLocale());
    }

    public function testGetName(): void
    {
        $entity = new AttributeTranslationPayload(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['translations'][0]);

        $this->assertEquals(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['translations'][0]['name'], $entity->getName());
    }

    public function testGetCustomData(): void
    {
        $entity = new AttributeTranslationPayload(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['translations'][0]);

        $customData = $entity->getCustomData();
        $this->assertInstanceOf(Payload::class, $customData);
        $this->assertSame(['test' => 1], $customData->getData());
    }

    public function testGetPayload(): void
    {
        $entity = new AttributeTranslationPayload(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['translations'][0]);

        $payload = $entity->getPayload();
        $this->assertInstanceOf(Payload::class, $payload);
        $this->assertSame(MockSyliusData::PRODUCT['attributeValues'][0]['attribute']['translations'][0], $payload->getData());
    }
}
