**Prueba Técnica Laravel - Garantías Comunitarias**  

A continuación, se describen las tareas que debes realizar en el framework Laravel para completar esta prueba técnica:  

---

### **Tareas a realizar**  

1. **Configuración inicial:**  
   - Instala Laravel localmente en tu entorno de desarrollo.  
   - Configura las variables de entorno en el archivo `.env` para establecer la conexión a la base de datos.  

2. **Solución de errores:**  
   - Identifica y corrige los posibles errores que impidan la correcta ejecución del backend.  

3. **CRUD de Entidades:**  
   - Verifica que el CRUD de Entidades funcione correctamente.  
   - Realiza las correcciones necesarias para garantizar su funcionalidad.  

4. **Relaciones de modelos:**  
   - Define las relaciones entre los modelos `Contactos` y `Entidades`, asegurando que estén correctamente configuradas en los modelos respectivos.  

5. **CRUD de Contactos:**  
   - Crea un controlador para `Contactos` con las siguientes validaciones:  
     - **Entidad existente:** Verifica que la entidad asociada exista en la tabla `entidades` antes de crear o actualizar un contacto.  
     - **Evitar duplicados:** Asegúrate de que no se repitan el nombre y el email del contacto en la base de datos.  
   - Implementa todas las operaciones básicas del CRUD (crear, leer, actualizar y eliminar).  

6. **Migración de Contactos:**  
   - Crea una migración para agregar un campo `identificacion` obligatorio en la tabla `contactos`.  
   - Asegúrate de que el campo `identificacion` sea único y obligatorio para la creación y edición de contactos.  

---

### **Instrucciones de entrega**  
1. **Rama para cambios:**  
   - Clonar el repositorio en tu máquina local
   - Crea una rama en el repositorio siguiendo el formato: **[Tus iniciales]_[Número de identificación]**.
   - Realiza todos los cambios necesarios en esta rama.

2. **sube los cambios a tu repositorio:**  
   - Una vez completadas las tareas, sube tus cambios a un repositorio publico en tu cuenta de github.
   - Envianos un correo con la ruta del repositorio.  

3. **Entrega alternativa:**  
   - Si encuentras dificultades para publicar en tu repositorio, sigue estos pasos:  
     - Comprime la carpeta del proyecto Laravel.  
     - Excluye la carpeta `vendor` para reducir el tamaño del archivo.  
     - Sube el archivo comprimido a una plataforma de almacenamiento en la nube (OneDrive, Google Drive, etc.).  
     - Comparte el enlace de descarga en un correo dirigido a la persona que te envió esta prueba.  

4. **Formato de entrega por correo:**  
   - Incluye en el correo una descripción breve del trabajo realizado y cualquier detalle relevante sobre la prueba.  
   - Si usaste almacenamiento en la nube, proporciona el enlace de descarga al archivo comprimido.  

---

Si tienes preguntas o necesitas asistencia técnica durante la ejecución de esta prueba, comunícate con el contacto que te proporcionó esta tarea. ¡Éxito en la prueba! 😊

---

## **Tareas Completadas por el Candidato (Samir Alejandro Gonzalez Albis)**

A continuación se detallan los cambios y tareas ejecutadas durante la resolución del Backend:

1. **Correcciones Iniciales en Entidades:**
   - Se solucionó el error `MassAssignmentException` agregando correctamente la propiedad `$fillable` en el modelo `Entidad`.
   - Implementación limpia de `EntidadController` utilizando `response()->json()` para devolver todas las transacciones solicitadas por Angular.

2. **Relaciones Configuradas:**
   - Se añadió la relación `Entidad::hasMany()` referenciando los contactos, y en contraparte la dependencia `Contacto::belongsTo()` unida a la entidad respectiva. Ambas relaciones se envían anidadas al frontend gracias al ORM (`with('entidad')`).

3. **CRUD de Contactos (API Restful):**
   - El controlador `ContactoController` ha sido modificado e incluye todos los métodos del CRUD solicitados.
   - **Entidad Existente:** Regla de validación `exists:entidades,id` sobre el atributo foráneo, denegando toda petición cuyo ID de entidad destino sea irreal.
   - **Prevención de Duplicados en Actualización:** Se implementó verificación en `store` y `update`. Se aseguró de no repetir `email` e `identificacion` (`unique:contactos,email,...`), e incluso previniendo repetición obligatoria del atributo `nombre` como sugerencia de optimización del test.

4. **Migraciones Completadas:**
   - Migración estructurada para agregar los campos solicitados en Contactos: `identificacion`, `apellido` y `cargo`.
   - La base de datos (SQLite) se encuentra completamente sincronizada e incluye llaves lógicas de unicidad en los esquemas.
   - Los comentarios de todas las clases y funciones PHP fueron unificados de forma declarativa, formal y puramente funcional, garantizando estándares en este framework.
