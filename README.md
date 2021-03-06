# AliTraza-v2
## version 2 del proyecto AliTraza

El Software de trazabilidad está destinado para la industria alimentaria Argentina. 
El mismo es customizable, modular y personalizado.

**Customizable**, ya que cada productor/empresa puede determinar el número de módulos que requiere para realizar la trazabilidad de sus productos o insumos.

**Modular**, ya que cada productor/empresa, de acuerdo a su industria, puede seleccionar un conjunto de módulos previamente desarrollados de acuerdo a las necesidades de su industria en particular.

**Personalizado**, ya que cada productor/empresa puede determinar el look & feel de su sistema de trazabilidad de acuerdo a su imagen de marca.

El software permitirá que distintos productores/empresas dentro de un mismo rubro puedan acceder a diferentes niveles de control de trazabilidad de acuerdo a sus necesidades puntuales, contando con la capacidad de tener un nivel básico de trazabilidad para mercados locales y escalar a futuro de acuerdo a las demandas de sus clientes internacionales.

Además, el software permitirá suscribirse a un cierto número de módulos durante un periodo de tiempo y luego desuscribirse de los mismos, preservando un nivel básico de servicio constante. 

De este modo los usuarios del sistema podrán experimentar con un mismo proveedor de servicios de trazabilidad, sin la necesidad de migrar sus operaciones en cada experimentación y sin la necesidad de incurrir en costos asociados a dichos procedimientos. 

El sistema de trazabilidad puede ser implementado en un comienzo en las siguientes industrias alimentarias:

- Producción apícola:
El sistema en esta industria está enfocado en empresas dedicadas a la exportación de mieles, con el objetivo de permitirles controlar la calidad de miel producida por cada proveedor de la entidad exportadora en cuestión.


## Funcionalidades Generales
   - Módulo Proveedores:
     - Determinar que productores serán evaluados como posibles proveedores en la siguiente ronda.
     - Determinar la categorización de los proveedores de acuerdo al nivel de calidad de productos generados históricamente.
     - Tipos de productos que se analizarán de cada proveedor.
     - Control de número de muestras por cada proveedor con identificación asociada a cada una de ellas.
     - Número y tipo de análisis que se realizarán a las muestras obtenidas de cada tipo de producto de cada productor.
     - Generación de un reporte por cada proveedor constatando el presupuesto final de evaluar sus productos.
     
   - Módulo Laboratorio:
      - Permite Adjuntar resultados de análisis de cada muestra de cada proveedor con los números de identificación de cada una de ellas.
      - Permite identificar el nombre del laboratorio, su ubicación, la fecha de realización de controles y el nombre del técnico del laboratorio que realizó dichos controles.
      - Permite realizar informes por proveedores que serán consultados por la solicitante.
      - Permite definir los rangos de aprobación de los análisis, así como hacer ABM de los análisis.
      
   - Módulo Compras:
     - Permite generar órdenes de compra tomando como punto de partida los análisis obtenidos por el laboratorio.
     - Permite un control jerárquico de la generación de las órdenes de compra, permitiendo que solo aquellas que cuentan con la debida autorización sean emitidas.
     - Permite la generación de claves de aprobación para usuarios con permisos especiales, de modo que puedan corroborar que ordenes de compra son emitidas y cuáles no.
     - Permite la eliminación de muestras desestimadas, por calidad u otros motivos.


## Desarrollo
El Sistema tiene como base como Dashboard a [SB Admin 2](https://startbootstrap.com/theme/sb-admin-2)
Que es una theme Open Source desarrollado con Bootstrap 4 y posibilita un diseño moderno inspirado por los principios de diseño de materiales, además de un sistema de colores simples y atracivos.

Alguno de los frameworks de frontend se utilizados es [Datatables](https://datatables.net/) para la visualización de tablas.
También se utilizó Javascript con [Jquery](https://jquery.com/).

Como backend se utilizó PHP5 bajo un stack LAMP.

## Capturas

#### Pantalla de Inicio
![](https://github.com/xotoxjp/AliTraza-v2/blob/d8fbb9f4f15bcef1fd44f8376a268a3848a891fb/assets/img/01.Pantalla%20Login.png)
![](https://github.com/xotoxjp/AliTraza-v2/blob/d8fbb9f4f15bcef1fd44f8376a268a3848a891fb/assets/img/02.Pantalla%20Login.png)

#### Dashboard Estadísticas
![](https://github.com/xotoxjp/AliTraza-v2/blob/d8fbb9f4f15bcef1fd44f8376a268a3848a891fb/assets/img/03.Pantalla%20Dashboard.png)

#### Módulo de Gestión de Usuarios
![](https://github.com/xotoxjp/AliTraza-v2/blob/d8fbb9f4f15bcef1fd44f8376a268a3848a891fb/assets/img/04.Pantalla%20User%20Admin.png)

#### Módulo de Compras
![](https://github.com/xotoxjp/AliTraza-v2/blob/d8fbb9f4f15bcef1fd44f8376a268a3848a891fb/assets/img/05.Pantalla%20ABM%20Productores.png)
![](https://github.com/xotoxjp/AliTraza-v2/blob/d8fbb9f4f15bcef1fd44f8376a268a3848a891fb/assets/img/06.Pantalla%20Alta%20Planila%20Presupuesto.png)

#### Módulo de Laboratorio
![](https://github.com/xotoxjp/AliTraza-v2/blob/d8fbb9f4f15bcef1fd44f8376a268a3848a891fb/assets/img/07.Pantalla%20Datos%20Laboratorio.png)
![](https://github.com/xotoxjp/AliTraza-v2/blob/d8fbb9f4f15bcef1fd44f8376a268a3848a891fb/assets/img/08.Pantalla%20Definicion%20Laboratorio.png)
