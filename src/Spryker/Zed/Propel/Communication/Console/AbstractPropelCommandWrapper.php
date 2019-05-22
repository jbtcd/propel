<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Propel\Communication\Console;

use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Spryker\Zed\Propel\Business\PropelFacadeInterface getFacade()
 * @method \Spryker\Zed\Propel\Communication\PropelCommunicationFactory getFactory()
 */
abstract class AbstractPropelCommandWrapper extends Console
{
    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null
     */
    protected function execute(InputInterface $input, OutputInterface $output): ?int
    {
        $this->info($this->getDescription());

        $propelOriginalCommand = $this->getFactory()
            ->createPropelCommandBuilder()
            ->createCommand(
                $this->getOriginalCommandClassName()
            );

        return $this->getFactory()->createPropelCommandRunner()->runOriginalCommand(
            $propelOriginalCommand,
            $this->getDefinition(),
            $output
        );
    }

    /**
     * @return string
     */
    abstract public function getOriginalCommandClassName(): string;
}