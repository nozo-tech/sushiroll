# Especificación de Requisitos de Software (SRS) para Sushiroll

## 1. Introducción

### 1.1 Propósito

Sushiroll es una plataforma social de nueva generación diseñada para combinar las mejores características de YouTube, Twitch, Reddit y Twitter, eliminando sus aspectos negativos. Este documento especifica los requisitos funcionales y no funcionales de Sushiroll de acuerdo con el estándar IEEE 830.

### 1.2 Convenciones del Documento

- Todos los títulos están formateados con `###` para indicar secciones.
- Los requisitos funcionales están enumerados numéricamente.
- Los requisitos no funcionales están prefijados con `NF-`.

### 1.3 Audiencia y Sugerencias de Lectura

Este documento está dirigido a los siguientes interesados:

- **Equipo de Desarrollo:** Para implementar el sistema según los requisitos.
- **Gerentes de Proyecto:** Para supervisar el progreso y la implementación de funciones.
- **Usuarios Finales:** Para comprender cómo funcionará el sistema.
- **Inversionistas y Partes Interesadas:** Para evaluar la viabilidad del proyecto.

### 1.4 Alcance del Producto

Sushiroll tiene como objetivo:

- Brindar una experiencia **centrada en el usuario** con opciones intuitivas de compartición de contenido.
- Implementar la mayoría de las funciones positivas de YouTube, Twitch, Reddit y Twitter.
- Evitar sesgos algorítmicos y proporcionar un motor de recomendación personalizable.
- Introducir **"Rolls" (videos), "Threads" (publicaciones/discusiones) y "Communities"** para la organización del contenido.
- Soportar **etiquetado de contenido NSFW**, permitiendo filtrado u ocultación según las preferencias del usuario.
- Ofrecer un **modelo de monetización progresivo** donde los creadores más pequeños obtienen el 80% de los ingresos publicitarios, aumentando hasta una comisión del 40% para los creadores más grandes.
- Requerir **códigos de invitación** de usuarios con acceso a canales para crear nuevos canales, asegurando una comunidad segura y libre de bots, IA y estafadores.
- Implementar la función **"Usuarios y Canales Contribuyentes"**, donde los usuarios pueden suscribirse con un pago mensual o los canales pueden ceder parte de sus ingresos para desbloquear funciones avanzadas (definidas en futuras fases de desarrollo).

## 2. Descripción General

### 2.1 Perspectiva del Producto

Sushiroll es una **aplicación web independiente** con diseño orientado a dispositivos móviles. Integrará:

- **Alojamiento y transmisión de videos** (similar a YouTube/Twitch)
- **Discusiones basadas en hilos** (como Reddit)
- **Actualizaciones rápidas y temas de tendencia** (como Twitter)
- **Sistema de monetización** con distribución progresiva de ingresos

### 2.2 Funciones del Producto

|Característica|Descripción|
|---|---|
|Rolls|Contenido en video, equivalente a los videos de YouTube|
|Threads|Publicaciones y discusiones, públicas o dentro de comunidades|
|Canales|Espacios de usuarios para la publicación de contenido (requiere código de invitación para creación)|
|Communities|Grupos de usuarios con intereses comunes|
|Grupos de Canales|Grupos colaborativos de creadores, como agencias de VTubers|
|Contenido NSFW|El contenido marcado se difumina u oculta según la configuración del usuario|
|Monetización Progresiva|Los creadores pequeños reciben el 80% de los ingresos, hasta un 40% para los más grandes|
|Usuarios y Canales Contribuyentes|Los usuarios o canales pueden suscribirse o ceder parte de sus ingresos para desbloquear funciones avanzadas|

### 2.3 Características del Usuario

Se espera que los usuarios tengan conocimientos básicos sobre plataformas sociales y compartición de contenido. El sistema está diseñado para **creadores**, **espectadores** y **administradores de comunidades** con diferentes niveles de interacción.

### 2.4 Restricciones

- No se permitirá contenido dirigido a niños.
- El contenido NSFW **debe** estar etiquetado apropiadamente.
- El modelo de ingresos debe garantizar una **distribución justa**.
- No todos los usuarios pueden crear un canal; se requiere un código de invitación para acceder a esta función.

## 3. Requisitos Específicos

### 3.1 Requisitos Funcionales

1. El sistema permitirá a los usuarios **subir y transmitir videos (Rolls)**.
2. El sistema proporcionará un **motor de recomendación personalizable**.
3. El sistema permitirá la **creación y administración de hilos (publicaciones y discusiones)**.
4. El sistema soportará **transmisiones en vivo**.
5. El sistema permitirá la creación de **comunidades de usuarios**.
6. El sistema requerirá el **etiquetado de contenido NSFW** al momento de la carga.
7. El sistema ofrecerá **opciones de monetización basadas en el tamaño del creador**, con un inicio en el 80% de participación en ingresos.
8. El sistema requerirá un **código de invitación para la creación de canales**, evitando abusos por bots, IA y estafadores.
9. El sistema ofrecerá la función **"Usuarios y Canales Contribuyentes"**, permitiendo suscripciones mensuales o cesión de ingresos para desbloquear funciones avanzadas.

### 3.2 Requisitos No Funcionales

NF-1. La plataforma debe garantizar **alta disponibilidad** con un 99.9% de tiempo de actividad. NF-2. El sistema debe **escalar** para soportar millones de usuarios. NF-3. La interfaz de usuario debe ser **móvil y responsiva**. NF-4. El contenido NSFW debe estar **difuminado por defecto** y oculto opcionalmente. NF-5. El motor de recomendación debe ser **transparente y personalizable**.

## 4. Apéndices

- **A. Glosario**
    - **Rolls**: Contenido en video.
    - **Threads**: Discusiones basadas en texto.
    - **Canales**: Perfiles de usuario para la publicación de contenido (requiere invitación para creación).
    - **Communities**: Grupos de usuarios para discusiones.
    - **Grupos de Canales**: Equipos de creadores colaborativos.
    - **Usuarios y Canales Contribuyentes**: Sistema para desbloquear funciones avanzadas mediante suscripción o cesión de ingresos.