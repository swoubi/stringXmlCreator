<?php

namespace XmlString;

class Creator
{
	private $root;
	private $data;

	public function __construct(string $root, string $header = '<?xml version="1.0" encoding="utf-8"?>')
	{
		$this->root = $root;
		$this->data = "{$header}<{$root}>";
	}

	public function openNode(string $name, array $attributes = []): Creator
	{
		$this->data .= "<{$name}{$this->buildAttributes($attributes)}>";

		return $this;
	}

	public function closeNode(string $name): Creator
	{
		$this->data .= "</$name>";

		return $this;
	}

	public function addValue(string $name, string $value, array $attributes = []): Creator
	{
		$value = str_replace(['"', '&', '\'', '<', '>'], ['&quot;', '&amp;', '&apos;', '&lt;', '&gt;'], $value);
		$this->data .= "<{$name}{$this->buildAttributes($attributes)}>{$value}</{$name}>";

		return $this;
	}

	public function finish(): string
	{
		$this->data .= "</{$this->root}>";
		return $this->data;
	}

	private function buildAttributes(array $attributes): string
	{
		$temp = '';

		foreach ($attributes as $key => $value) {
			$temp .= " {$key}=\"{$value}\"";
		}

		return $temp;
	}
}