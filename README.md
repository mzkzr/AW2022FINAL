# AW2022FINAL

- API Reference
---------------

Provincias

| Request | Modelo | Descripción |
| ------- | ------ | ----------- |
| GET | /provincias/ | Obtener todas las provincias |
| GET | /provincias/_id_ | Obtener la provincia {id} |
| POST | /provincias?_parametros_ | Crear provincia |
| | 'nombre' => 'required' | |
| PUT | /provincias?_parametros_ | Editar provincia |
| | 'nombre' => 'sometimes\|required' | |
| DELETE | /provincias/_id_ | Eliminar provincia |


Localidades:

| Request | Modelo | Descripción |
| ------- | ------ | ----------- |
| GET | /localidades/ | Obtener todas las localidades |
| GET | /localidades?_parametros_ | Obtener la localidades utilizando filtros |
| | 'provincia_id' => 'sometimes\|required' |
| GET | /localidades/_id_ | Obtener la localidad {id} |
| POST | /localidades?_parametros_ | Crear localidad |
| | 'nombre' => 'required' | |
| | 'provincia_id' => 'required' | |
| PUT | /localidades?_parametros_ | Editar localidad |
| | 'nombre' => 'sometimes|required' | |
| | 'provincia_id' => 'sometimes|required' | |
| DELETE | /localidades/_id_ | Eliminar localidad |


Productores:
    GET /productores/                   Obtener todas las productores

    GET /productores/id                 Obtener el productor {id}

    POST /productores?_parametros_      Crear productor
        'nombre' => 'required',
        'cuit' => 'required',
        'domicilio' => 'required',
        'provincia_id' => 'required',
        'localidad_id' => 'required'

    PUT /productores?_parametros_       Editar productor
        'nombre' => 'sometimes|required',
        'cuit' => 'sometimes|required',
        'domicilio' => 'sometimes|required',
        'provincia_id' => 'sometimes|required',
        'localidad_id' => 'sometimes|required'

    DELETE /productores/id              Eliminar productor