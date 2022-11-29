# AW2022FINAL

- API Reference
---------------

Usuarios

| Request |   | Descripción |
| ------- | - | ----------- |
| GET | /register?_parametros_ | Crear usuario |
| | 'name' => 'required' | |
| | 'email' => 'required\|email' | |
| | 'password' => 'required' | |
| | 'confirm_password' => 'required\|same:password' | |
| GET | /login?_parametros_ | Login de usuario |
| | 'email' => 'required\|email' | |
| | 'password' => 'required' | |

Provincias

| Request |   | Descripción |
| ------- | - | ----------- |
| GET | /provincias/ | Obtener todas las provincias |
| GET | /provincias/_id_ | Obtener la provincia {id} |
| POST | /provincias?_parametros_ | Crear provincia |
| | 'nombre' => 'required' | |
| PUT | /provincias?_parametros_ | Editar provincia |
| | 'nombre' => 'sometimes\|required' | |
| DELETE | /provincias/_id_ | Eliminar provincia |


Localidades

| Request |   | Descripción |
| ------- | - | ----------- |
| GET | /localidades/ | Obtener todas las localidades |
| GET | /localidades?_parametros_ | Obtener localidades utilizando filtros |
| | 'provincia_id' => 'sometimes\|required\|integer' | |
| GET | /localidades/_id_ | Obtener la localidad {id} |
| POST | /localidades?_parametros_ | Crear localidad |
| | 'nombre' => 'required' | |
| | 'provincia_id' => 'required\|integer' | |
| PUT | /localidades?_parametros_ | Editar localidad |
| | 'nombre' => 'sometimes\|required' | |
| | 'provincia_id' => 'sometimes\|required\|integer' | |
| DELETE | /localidades/_id_ | Eliminar localidad |


Productores

| Request |   | Descripción |
| ------- | - | ----------- |
| GET | /productores/ | Obtener todos los productores |
| GET | /productores?_parametros_ | Obtener productores utilizando filtros |
| | 'nombre' => 'sometimes\|required' | |
| | 'provincia_id' => 'sometimes\|required\|integer' | |
| | 'localidad_id' => 'sometimes\|required\|integer' | |
| GET | /productores/_id_ | Obtener el productor {id} |
| POST | /productores?_parametros_ | Crear productor |
| | 'nombre' => 'required' | |
| | 'cuit' => 'required\|integer' | |
| | 'domicilio' => 'required' | |
| | 'provincia_id' => 'required\|integer' | |
| | 'localidad_id' => 'required\|integer' | |
| PUT | /productores?_parametros_ | Editar productor |
| | 'nombre' => 'sometimes\|required' | |
| | 'cuit' => 'sometimes\|required\|integer' | |
| | 'domicilio' => 'sometimes\|required' | |
| | 'provincia_id' => 'sometimes\|required\|integer' | |
| | 'localidad_id' => 'sometimes\|required\|integer' | |
| DELETE | /productores/_id_ | Eliminar productor |

Cervezas

| Request |   | Descripción |
| ------- | - | ----------- |
| GET | /cervezas/ | Obtener todas las cervezas |
| GET | /cervezas?_parametros_ | Obtener cervezas utilizando filtros |
| | 'nombre' => 'sometimes\|required' |
| | 'productor_id' => 'sometimes\|required\|integer' |
| | 'abv_min' => 'sometimes\|required\|float' |
| | 'abv_max' => 'sometimes\|required\|float' |
| | 'ibu_min' => 'sometimes\|required\|integer' |
| | 'ibu_max' => 'sometimes\|required\|integer' |
| | 'srm_min' => 'required\|integer' |
| | 'srm_max' => 'required\|integer' |
| | 'og_min' => 'required\|integer' |
| | 'og_max' => 'required\|integer' |
| GET | /cervezas/_id_ | Obtener la cerveza {id} |
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

Cervecerías

| Request |   | Descripción |
| ------- | - | ----------- |
| GET | /cervecerias/ | Obtener todas las cervecerías |
| GET | /cervecerias?_parametros_ | Obtener cervecerías utilizando filtros |
| | 'nombre' => 'sometimes\|required' |
| | 'provincia_id' => 'sometimes\|required\|integer' |
| | 'localidad_id' => 'sometimes\|required\|integer' |
| GET | /cervecerias/_id_ | Obtener la cervecería {id} |
| POST | /cervecerias?_parametros_ | Crear cervecería |
| | 'nombre' => 'required' | |
| | 'cuit' => 'required\|integer' | |
| | 'domicilio' => 'required' | |
| | 'provincia_id' => 'required\|integer' | |
| | 'localidad_id' => 'required\|integer' | |
| | 'horario_atencion' | |
| PUT | /cervecerias?_parametros_ | Editar cervecería |
| | 'nombre' => 'sometimes\|required' |
| | 'cuit' => 'sometimes\|required\|integer' | |
| | 'domicilio' => 'sometimes\|required' | |
| | 'provincia_id' => 'sometimes\|required\|integer' | |
| | 'localidad_id' => 'sometimes\|required\|integer' | |
| | 'horario_atencion' | |
| DELETE | /cervecerias/_id_ | Eliminar cervecería |

Puntos de venta

| Request |   | Descripción |
| ------- | - | ----------- |
| GET | /puntos_venta/ | Obtener todos los puntos de venta |
| GET | /puntos_venta?_parametros_ | Obtener puntos de venta utilizando filtros |
| | 'cerveza_id' => 'sometimes\|required\|integer' |
| | 'cerveceria_id' => 'sometimes\|required\|integer' |
| GET | /puntos_venta/_id_ | Obtener el punto de venta {id} |
| POST | /puntos_venta?_parametros_ | Crear punto de venta |
| | 'cerveza_id' => 'required\|integer' |
| | 'cerveceria_id' => 'required\|integer' |
| PUT | /puntos_venta?_parametros_ | Editar punto de venta |
| | 'cerveza_id' => 'sometimes\|required\|integer' |
| | 'cerveceria_id' => 'sometimes\|required\|integer' |
| DELETE | /puntos_venta/_id_ | Eliminar punto de venta |