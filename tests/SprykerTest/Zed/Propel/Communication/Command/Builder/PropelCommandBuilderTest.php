<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\Propel\Communication\Command\Builder;

use Codeception\Test\Unit;
use Spryker\Zed\Propel\Communication\Command\Builder\PropelCommandBuilder;
use Spryker\Zed\Propel\Communication\Command\Config\PropelCommandConfiguratorInterface;
use Spryker\Zed\PropelOrm\Business\Generator\Command\ModelBuildCommand;
use Spryker\Zed\PropelOrm\Business\Generator\Command\SqlBuildCommand;
use Spryker\Zed\PropelOrm\Business\Generator\ConfigurablePropelCommandInterface;
use Symfony\Component\Console\Command\Command;

/**
 * Auto-generated group annotations
 * @group SprykerTest
 * @group Zed
 * @group Propel
 * @group Communication
 * @group Command
 * @group Builder
 * @group PropelCommandBuilderTest
 * Add your own group annotations below this line
 */
class PropelCommandBuilderTest extends Unit
{
    /**
     * @var \Spryker\Zed\Propel\Communication\Command\Builder\PropelCommandBuilderInterface
     */
    protected $propelCommandBuilder;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->propelCommandBuilder = new PropelCommandBuilder(
            $this->getMockBuilder(PropelCommandConfiguratorInterface::class)->getMock()
        );
    }

    /**
     * @dataProvider propelCommandClassNameDataProvider
     *
     * @param string $propelCommandClassName
     *
     * @return void
     */
    public function testCreateCommand(string $propelCommandClassName): void
    {
        $propelOriginalCommand = $this->propelCommandBuilder->createCommand($propelCommandClassName);
        $this->assertInstanceOf($propelCommandClassName, $propelOriginalCommand);
        $this->assertInstanceOf(ConfigurablePropelCommandInterface::class, $propelOriginalCommand);
        $this->assertInstanceOf(Command::class, $propelOriginalCommand);
    }

    /**
     * @return array
     */
    public function propelCommandClassNameDataProvider(): array
    {
        return [
            [ModelBuildCommand::class],
            [SqlBuildCommand::class],
        ];
    }
}
