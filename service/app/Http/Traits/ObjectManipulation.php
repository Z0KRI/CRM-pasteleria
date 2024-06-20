<?php

namespace App\Http\Controllers\Traits;

use App\Exceptions\NotUpdatable;
use Symfony\Component\HttpFoundation\Response;

trait ObjectManipulation
{
	public function validUpdate($object, $data, $resource = ''): \Illuminate\Http\JsonResponse
	{
		$object->fill($data);
		if ($object->isClean()) {
			throw new NotUpdatable('No hay nada que actualizar');
		}
		$affected = $object->save();

		return $this->response(
			$resource ? $resource::make($object) : $object,
			'PUT',
			'Elemento actualizado correctamente',
			Response::HTTP_OK,
			$affected
		);
	}

	public function createElement($object, $data, $resource = '', $job = null): \Illuminate\Http\JsonResponse
	{
		$newObject = $object::create($data);
		if (!is_null($job)) {
			$job::dispatch($newObject->toArray());
		}
		return $this->response($newObject, 'POST', 'Elemento creado exitosamente', Response::HTTP_CREATED);
	}

	public function deleteElement($element, $resource = ''): \Illuminate\Http\JsonResponse
	{
		$affected = $element->delete();
		return $this->response(
			$resource ? $resource::make($element) : $element,
			'DELETE',
			'Elemento eliminado correctamente',
			Response::HTTP_OK,
			$affected
		);
	}
}
