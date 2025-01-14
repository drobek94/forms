<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Nette\Bridges\FormsLatte;

use Latte;


/**
 * Latte v3 extension for Nette Forms.
 */
final class FormsExtension extends Latte\Extension
{
	public function getTags(): array
	{
		return [
			'form' => [Nodes\FormNode::class, 'create'],
			'formContext' => [Nodes\FormNode::class, 'create'],
			'formContainer' => [Nodes\FormContainerNode::class, 'create'],
			'label' => [Nodes\LabelNode::class, 'create'],
			'input' => [Nodes\InputNode::class, 'create'],
			'inputError' => [Nodes\InputErrorNode::class, 'create'],
			'formPrint' => [Nodes\FormPrintNode::class, 'create'],
			'formClassPrint' => [Nodes\FormPrintNode::class, 'create'],
			'n:name' => fn(Latte\Compiler\Tag $tag) => yield from strtolower($tag->htmlElement->name) === 'form'
				? Nodes\FormNNameNode::create($tag)
				: Nodes\FieldNNameNode::create($tag),
		];
	}


	public function getProviders(): array
	{
		return [
			'forms' => new Runtime,
		];
	}


	public function getCacheKey(Latte\Engine $engine): array
	{
		return ['version' => 2];
	}
}
