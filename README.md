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
| GET | /localidades?_parametros_ | Obtener localidades utilizando filtros |
| | 'provincia_id' => 'sometimes\|required\|integer' |
| GET | /localidades/_id_ | Obtener la localidad {id} |
| POST | /localidades?_parametros_ | Crear localidad |
| | 'nombre' => 'required' | |
| | 'provincia_id' => 'required\|integer' | |
| PUT | /localidades?_parametros_ | Editar localidad |
| | 'nombre' => 'sometimes\|required' | |
| | 'provincia_id' => 'sometimes\|required\|integer' | |
| DELETE | /localidades/_id_ | Eliminar localidad |



Productores:

| Request | Modelo | Descripción |
| ------- | ------ | ----------- |
| GET | /productores/ | Obtener todos los productores |
| GET | /productores?_parametros_ | Obtener productores utilizando filtros |
| | 'nombre' => 'sometimes\|required' |
| | 'provincia_id' => 'sometimes\|required\|integer' |
| | 'localidad_id' => 'sometimes\|required\|integer' |
| GET | /productores/_id_ | Obtener el productor {id} |
| POST | /productores?_parametros_ | Crear productor |
| | 'nombre' => 'required' | |
| | 'cuit' => 'required\|integer' | |
| | 'domicilio' => 'required' | |
| | 'provincia_id' => 'required\|integer' | |
| | 'localidad_id' => 'required\|integer' | |
| PUT | /productores?_parametros_ | Editar productor |
| | 'nombre' => 'sometimes\|required' |
| | 'cuit' => 'sometimes\|required\|integer' |
| | 'domicilio' => 'sometimes\|required' |
| | 'provincia_id' => 'sometimes\|required\|integer' |
| | 'localidad_id' => 'sometimes\|required\|integer' |
| DELETE | /productores/_id_ | Eliminar productor |

Cervezas:

| Request | Modelo | Descripción |
| ------- | ------ | ----------- |
| GET | /cervezas/ | Obtener todas las cervezas |
| GET | /cervezas?_parametros_ | Obtener cervezas utilizando filtros |
| | 'nombre' => 'sometimes\|required' |
| | 'provincia_id' => 'sometimes\|required\|integer' |
| | 'localidad_id' => 'sometimes\|required\|integer' |
| GET | /cervezas/_id_ | Obtener el productor {id} |
| POST | /cervezas?_parametros_ | Crear cerveza |
| | 'nombre' => 'required' | |
| | 'abv' => 'required\|float' | |
| | 'ibu' => 'required\|integer' | |
| | 'srm' => 'integer' | |
| | 'og' => 'integer' | |
| | 'productor_id' => 'required\|integer' | |
| PUT | /cervezas?_parametros_ | Editar cerveza |
| | 'nombre' => 'sometimes\|required' | |
| | 'abv' => 'sometimes\|required\|float' | |
| | 'ibu' => 'sometimes\|required\|integer' | |
| | 'srm' => 'sometimes\|integer' | |
| | 'og' => 'sometimes\|integer' | |
| | 'productor_id' => 'sometimes\|required\|integer' | |
| DELETE | /cervezas/_id_ | Eliminar cerveza |