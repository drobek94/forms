<?php

/**
 * Rules for Nette Coding Standard
 * https://github.com/nette/coding-standard
 */

declare(strict_types=1);


return function (Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator): void {
	$containerConfigurator->import(PRESET_DIR . '/php71.php');

	$parameters = $containerConfigurator->parameters();

	$parameters->set('skip', [
		'fixtures/*',
		'tests/Forms/Container.values.mapping.74.phpt',
		'tests/Forms/Container.values.mapping-constructor.phpt',
	]);
};