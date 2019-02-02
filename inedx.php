ONFIGURACIÓN
rebase.useBuiltin
Se establece en falsepara usar la implementación de shellscript heredada de git-rebase [1] . Es truepor defecto, lo que significa usar la reescritura incorporada en C.

La reescritura de C se incluye primero con Git versión 2.20. Esta opción sirve como trampa de escape para volver a habilitar la versión heredada en caso de que se encuentren errores en la reescritura. Esta opción y la versión de shellscript de git-rebase [1] se eliminarán en una versión futura.

Si encuentra alguna razón para establecer esta opción en falseotra que no sea una prueba única, debe informar la diferencia de comportamiento como un error en git.

rebase.stat
Si se debe mostrar una diferencia de lo que cambió en sentido ascendente desde la última actualización. Falso por defecto.

rebase.autoSquash
Si se establece en verdadero habilita la --autosquashopción por defecto.

rebase.autoStash
Cuando se establece en verdadero, crea automáticamente una entrada de almacenamiento temporal antes de que comience la operación y aplíquela después de que finalice la operación. Esto significa que puede ejecutar rebase en un área de trabajo sucia. Sin embargo, úselo con cuidado: la aplicación de alijo final después de una reconfiguración exitosa podría resultar en conflictos no triviales. Esta opción puede ser anulada por --no-autostashy las --autostashopciones de git-rebase [1] . El valor predeterminado es falso.

rebase.missingCommitsCheck
Si se configura en "advertir", git rebase -i imprimirá una advertencia si se eliminan algunas confirmaciones (por ejemplo, se eliminó una línea), sin embargo, la rebase continuará. Si se configura en "error", se imprimirá la advertencia anterior y se detendrá la rebase, git rebase --edit-todo se puede usar para corregir el error. Si se establece en "ignorar", no se realiza ninguna comprobación. Para eliminar una confirmación sin advertencia o error, use el drop comando en la lista de tareas pendientes. El valor predeterminado es "ignorar".

rebase.instructionFormat
Una cadena de formato, como se especifica en git-log [1] , que se utilizará para la lista de tareas pendientes durante un rebase interactivo. El formato tendrá automáticamente el hash de confirmación largo al formato.

rebase.abbreviateCommands
Si se establece en verdadero, git rebaseutilizará los nombres de comandos abreviados en la lista de tareas, lo que resultará en algo como esto:

	p deadbee el oneline del commit
	p fa1afe1 La línea de la próxima confirmación
	...
en lugar de:

	pick deadbee el oneline del commit
	pick fa1afe1 La línea de la próxima confirmación
	...
El valor predeterminado es falso.

OPCIONES
--to <newbase>
Punto de partida en el que crear las nuevas confirmaciones. Si no se especifica la opción --onto, el punto de inicio es <upstream>. Puede ser cualquier confirmación válida, y no solo un nombre de rama existente.

Como caso especial, puede utilizar "A ... B" como acceso directo para la base de combinación de A y B si hay exactamente una base de combinación. Puede omitir a lo más uno de A y B, en cuyo caso el valor predeterminado es HEAD.

<upstream>
Rama aguas arriba para comparar contra. Puede ser cualquier confirmación válida, no solo un nombre de rama existente. El valor predeterminado es el flujo ascendente configurado para la rama actual.

<branch>
Rama de trabajo; por defecto a HEAD.

--continuar
Reinicie el proceso de rebasado después de haber resuelto un conflicto de combinación.

--abortar
Abortar la operación de rebase y restablecer HEAD a la rama original. Si se proporcionó <branch> cuando se inició la operación de rebase, entonces HEAD se restablecerá a <branch>. De lo contrario, HEAD se restablecerá donde estaba cuando se inició la operación de rebase.

--dejar
Anule la operación de rebase pero HEAD no se restablece de nuevo a la rama original. El índice y el árbol de trabajo también se dejan sin cambios como resultado.

- mantener vacío
Mantener los compromisos que no cambien nada de sus padres en el resultado.

Ver también OPCIONES INCOMPATIBLES a continuación.

--mitir-vacío-mensaje
De forma predeterminada, la confirmación con un mensaje vacío fallará. Esta opción anula ese comportamiento, permitiendo que las confirmaciones con mensajes vacíos se vuelvan a basar.

Ver también OPCIONES INCOMPATIBLES a continuación.

--omitir
Reinicie el proceso de rebasado omitiendo el parche actual.

--edit-todo
Editar la lista de tareas durante un rebase interactivo.

--show-current-patch
Muestre el parche actual en una rebase interactiva o cuando se pare la rebase debido a conflictos. Este es el equivalente de git show REBASE_HEAD.

-metro
--unir
Utilice las estrategias de fusión para rebase. Cuando se utiliza la estrategia de fusión recursiva (predeterminada), esto permite que la rebase tenga en cuenta los renombramientos en el lado ascendente.

Tenga en cuenta que una combinación de rebase funciona al reproducir cada confirmación desde la rama de trabajo en la parte superior de la rama <upstream>. Debido a esto, cuando ocurre un conflicto de combinación, el lado reportado como el nuestro es la serie hasta ahora rebasada, comenzando con <upstream>, y la suya es la rama de trabajo. En otras palabras, los lados se intercambian.

Ver también OPCIONES INCOMPATIBLES a continuación.

-s <estrategia>
--strategia = <estrategia>
Usa la estrategia de fusión dada. Si no hay -sopción git merge-recursive se usa en su lugar. Esto implica --merge.

Debido a que git rebase reproduce cada commit de la rama de trabajo en la parte superior de la rama <upstream> usando la estrategia dada, el uso de nuestra estrategia simplemente vacía todos los parches de la <branch>, lo cual no tiene mucho sentido.

Ver también OPCIONES INCOMPATIBLES a continuación.

-X <estrategia-opción>
--strategia-opción = <estrategia- opción>
Pase la <strategia-opción> a través de la estrategia de fusión. Esto implica --mergey, si se ha especificado ninguna estrategia, -s recursive. Tenga en cuenta la inversión de la nuestra y la de ellos como se indicó anteriormente para la -mopción.

Ver también OPCIONES INCOMPATIBLES a continuación.

-S [<keyid>]
--gpg-sign [= <keyid>]
GPG-firma se compromete. El keyidargumento es opcional y por defecto a la identidad del remitente; si se especifica, debe estar pegado a la opción sin un espacio.

-q
--tranquilo
Silencio. Implica --no-stat.

-v
--verboso
Ser verboso Implica --stat.

--estado
Muestre una diferencia de lo que cambió en sentido ascendente desde la última actualización. El diffstat también es controlado por la opción de configuración rebase.stat.

-norte
--no-stat
No muestre un diffstat como parte del proceso de rebase.

--no-verificar
Esta opción omite el gancho de pre-rebase. Ver también githooks [5] .

--verificar
Permite que se ejecute el gancho de pre-rebase, que es el predeterminado. Esta opción se puede utilizar para anular --no-Verify. Ver también githooks [5] .

-C <n>
Asegúrese de que al menos <n> las líneas de contexto circundante coincidan antes y después de cada cambio. Cuando existen menos líneas de contexto circundante, todas deben coincidir. Por defecto, ningún contexto es ignorado.

Ver también OPCIONES INCOMPATIBLES a continuación.

--no-ff
--fuerza-rebase
-F
Reproduce individualmente todas las confirmaciones rebasadas en lugar de avanzar rápidamente sobre las que no han cambiado. Esto asegura que todo el historial de la rama rebasada se compone de nuevos compromisos.

Puede encontrar esto útil después de revertir una combinación de rama de tema, ya que esta opción recrea la rama de tema con confirmaciones nuevas para que pueda ser resguardada exitosamente sin necesidad de "revertir la reversión" (vea el Cómo revertir-a-faulty-merge para detalles).

punto de entrada
--no-tenedor-punto
Utilice el método de búsqueda por retroceso para encontrar un mejor ancestro común entre <upstream> y <branch> al calcular qué confirmaciones han sido introducidas por <branch>.

Cuando --fork-point está activo, fork_point se usará en lugar de <upstream> para calcular el conjunto de confirmaciones de rebase, donde fork_point es el resultado del git merge-base --fork-point <upstream> <branch>comando (consulte git-merge-base [1] ). Si fork_point termina vacío, se utilizará <upstream> como un retroceso.

Si se da <upstream> o --root en la línea de comando, entonces el valor predeterminado es --no-fork-point, de lo contrario, el valor predeterminado es --fork-point.

- nuevo espacio en blanco
- espacio en blanco = <opción>
Estos indicadores se pasan al programa git apply (ver git-apply [1] ) que aplica el parche.

Ver también OPCIONES INCOMPATIBLES a continuación.

--committer-date-is-author-date
--la fecha de inicio
Estas banderas se pasan a git am para cambiar fácilmente las fechas de las confirmaciones rebasadas (ver git-am [1] ).

Ver también OPCIONES INCOMPATIBLES a continuación.

--cerrar sesión
Agregar un trailer de Firmed-off-by a todas las confirmaciones rebasadas. Tenga en cuenta que si --interactivese otorga, solo se agregará el trailer a los marcados para ser seleccionados, editados o reformulados.

Ver también OPCIONES INCOMPATIBLES a continuación.

-yo
--interactivo
Haga una lista de las confirmaciones que están a punto de ser rebasadas. Deje que el usuario edite esa lista antes de volver a basar. Este modo también se puede usar para dividir confirmaciones (consulte los COMPROMISOS DE DIVULGACIÓN a continuación).

El formato de la lista de confirmación se puede cambiar configurando la opción de configuración rebase.instructionFormat. Un formato de instrucción personalizado tendrá automáticamente el hash de confirmación largo ante el formato.

Ver también OPCIONES INCOMPATIBLES a continuación.

-r
--rebase-merges [= (rebase-primos | no-rebase-primos)]
De manera predeterminada, una rebase simplemente eliminará las confirmaciones de combinación de la lista de tareas pendientes y colocará las confirmaciones rebasadas en una única rama lineal. Con --rebase-merges, la rebase intentará preservar la estructura de bifurcación dentro de las confirmaciones que se van a rebasar, recreando las confirmaciones de combinación. Cualquier conflicto de fusión resuelto o las enmiendas manuales en estas confirmaciones de fusión deberán resolverse / volver a aplicarse manualmente.

De forma predeterminada, o cuando no-rebase-cousinsse especificó, las confirmaciones que no tienen <upstream>como antecesor directo mantendrán su punto de ramificación original, es decir, las confirmaciones que quedarán excluidas por la opción de git 1--ancestry-path mantendrán su ascendencia original de forma predeterminada. Si el rebase-cousinsmodo está activado, dichas confirmaciones se vuelven a basar en <upstream>(o <onto>, si se especifica).

El --rebase-mergesmodo es similar en espíritu a --preserve-merges, pero en contraste con esa opción, funciona bien en las rebases interactivas: los compromisos se pueden reordenar, insertar y eliminar a voluntad.

Actualmente solo es posible volver a crear las confirmaciones de fusión utilizando la recursiveestrategia de fusión; Las diferentes estrategias de fusión solo se pueden utilizar a través de exec git merge -s <strategy> [...]comandos explícitos .

Consulte también REBASEAR FUSIONES y OPCIONES INCOMPATIBLES a continuación.

-pag
- fusiones
Vuelva a crear las confirmaciones de combinación en lugar de aplanar el historial reproduciendo las confirmaciones de una combinación de confirmaciones. Las soluciones de fusión de conflictos o las enmiendas manuales para fusionar confirmaciones no se conservan.

Esto usa la --interactivemaquinaria internamente, pero combinarla con la --interactiveopción explícitamente generalmente no es una buena idea a menos que sepa lo que está haciendo (vea FALLOS a continuación).

Ver también OPCIONES INCOMPATIBLES a continuación.

-x <cmd>
--exec <cmd>
Agregue "exec <cmd>" después de cada línea creando un compromiso en el historial final. <cmd> se interpretará como uno o más comandos de shell. Cualquier comando que falle interrumpirá la rebase, con el código de salida 1.

Puede ejecutar varios comandos utilizando una instancia de --exec con varios comandos:

git rebase -i - exec "cmd1 && cmd2 && ..."
o dando más de uno --exec:

git rebase -i --exec "cmd1" --exec "cmd2" --exec ...
Si --autosquashse usa, las líneas "exec" no se agregarán a las confirmaciones intermedias, y solo aparecerán al final de cada serie de squash / corrección.

Esto utiliza la --interactivemaquinaria internamente, pero se puede ejecutar sin un explícito --interactive.

Ver también OPCIONES INCOMPATIBLES a continuación.

--raíz
Cambie de base todas las confirmaciones accesibles desde <branch>, en lugar de limitarlas con una <upstream>. Esto le permite reajustar la (s) confirmación (es) raíz en una rama. Cuando se usa con --onto, omitirá los cambios ya contenidos en <newbase> (en lugar de <upstream>), mientras que sin --onto operará en cada cambio. Cuando se usan junto con --onto y --preserve-merges, todos las confirmaciones de raíz se volverán a escribir para que tengan <newbase> como principal.

Ver también OPCIONES INCOMPATIBLES a continuación.

--autosquash
--no-autosquash
Cuando el mensaje de registro de confirmación comience con "squash! ..." (o "fixup! ..."), y ya hay una confirmación en la ...lista de tareas que coincide con la misma , modifique automáticamente la lista de tareas pendientes de rebase -i para que la confirmación marcada para el aplastamiento llega justo después de la confirmación que se va a modificar, y cambia la acción de la confirmación movida de picka squash(o fixup). Una confirmación coincide con ...si el sujeto de confirmación coincide, o si se ...refiere al hash de confirmación. Como un retroceso, las coincidencias parciales del sujeto de trabajo también funcionan. La forma recomendada de crear confirmaciones de corrección / squash es usando las --fixup/ --squashopciones de git-commit [1] .

Si la --autosquashopción está habilitada de forma predeterminada utilizando la variable de configuración rebase.autoSquash, esta opción se puede usar para anular y deshabilitar esta configuración.

Ver también OPCIONES INCOMPATIBLES a continuación.

--Autostash
--no-autostash
Cree automáticamente una entrada de alijo temporal antes de que comience la operación, y aplíquela una vez que finalice la operación. Esto significa que puede ejecutar rebase en un área de trabajo sucia. Sin embargo, úselo con cuidado: la aplicación de alijo final después de una reconfiguración exitosa podría resultar en conflictos no triviales.

OPCIONES INCOMPATIBLES
git-rebase tiene muchas banderas que son incompatibles entre sí, principalmente debido a que tiene tres implementaciones subyacentes diferentes:

uno basado en git-am [1] (por defecto)

uno basado en git-merge-recursive (fusionar backend)

uno basado en git-cherry-pick [1] (backend interactivo)

Banderas solo entendidas por el backend am:

--committer-date-is-author-date

--la fecha de inicio

--espacio en blanco

- nuevo espacio en blanco

-DO

Banderas entendidas tanto por fusión como por backends interactivos:

--unir

--estrategia

- estrategia-opción

--mitir-vacío-mensaje

Banderas solo entendidas por el backend interactivo:

- [no-] autosquash

--rebase-fusiones

- fusiones

--interactivo

--exec

- mantener vacío

--autosquash

--edit-todo

--root cuando se usa en combinación con --onto

Otros pares de banderas incompatibles:

--preserve-fusiones y --interactivo

--preserve-fusiones y --soffoff

--grupos en reserva y - fusión en base a

--rebase-fusiones y --estrategia

--rebase-merges y --strategy-option

DIFERENCIAS DE COMPORTAMIENTO
Hay algunas diferencias sutiles de cómo se comportan los backends.

Asientos vacíos
El backend de la mañana elimina cualquier confirmación "vacía", independientemente de si la confirmación se inició vacía (no tuvo cambios con respecto a su elemento primario para comenzar) o terminó vacía (todas las modificaciones ya se aplicaron en sentido ascendente en otras confirmaciones).

El backend de fusión hace lo mismo.

El backend interactivo elimina las confirmaciones que se iniciaron en vacío y se detiene si llega a una confirmación que terminó vacía. El --keep-emptyexiste la opción para el backend interactiva para permitir que se mantenga confirmaciones que comenzaron vacía.

Directorio cambio de nombre detección
La combinación y los backends interactivos funcionan bien con la detección de cambio de nombre de directorio. El backend am a veces no lo hace.

ESTRATEGIAS DE MERGE
El mecanismo de fusión ( git mergey git pullcomandos) permite que las estrategias de fusión de back-end sean elegidas con -sopción. Algunas estrategias también pueden tomar sus propias opciones, que pueden pasarse dando -X<option> argumentos a git mergey / o git pull.

resolver
Esto solo puede resolver dos cabezas (es decir, la rama actual y otra rama que extrajo) usando un algoritmo de combinación de 3 vías. Intenta detectar cuidadosamente las ambigüedades de fusión entrecruzada y se considera generalmente segura y rápida.

recursivo
Esto solo puede resolver dos cabezas usando un algoritmo de combinación de 3 vías. Cuando hay más de un ancestro común que puede usarse para la combinación de 3 vías, crea un árbol combinado de los ancestros comunes y lo utiliza como el árbol de referencia para la combinación de 3 vías. Se ha informado que esto genera menos conflictos de fusión sin causar errores de fusión en las pruebas realizadas en las confirmaciones de fusión reales tomadas del historial de desarrollo del kernel de Linux 2.6. Además, esto puede detectar y manejar las combinaciones que involucran renombramientos, pero actualmente no puede hacer uso de las copias detectadas. Esta es la estrategia de fusión predeterminada al extraer o fusionar una rama.

La estrategia recursiva puede tomar las siguientes opciones:

la nuestra
Esta opción obliga a los usuarios en conflicto a resolverse de forma limpia al favorecer nuestra versión. Los cambios del otro árbol que no entren en conflicto con nuestro lado se reflejan en el resultado de la fusión. Para un archivo binario, todo el contenido está tomado de nuestro lado.

Esto no debe confundirse con la nuestra estrategia de fusión, que ni siquiera mira lo que contiene el otro árbol. Descarta todo lo que hizo el otro árbol, declarando que nuestra historia contiene todo lo que sucedió en ella.

suyo
Esto es lo contrario de lo nuestro ; en cuenta que, a diferencia de la nuestra , no existe la suya la estrategia de combinación de confundir esta opción de combinación con.

paciencia
Con esta opción, merge-recursive pasa un poco más de tiempo para evitar errores que a veces se producen debido a líneas coincidentes sin importancia (por ejemplo, llaves de distintas funciones). Use esto cuando las ramas que se fusionarán se hayan desviado enormemente. Véase también git-diff [1] --patience .

diff-algorithm = [paciencia | mínimo | histograma | myers]
Indica fusión recursiva para usar un algoritmo de diferencia diferente, que puede ayudar a evitar errores que se producen debido a líneas coincidentes poco importantes (como llaves de distintas funciones). Véase también git-diff [1] --diff-algorithm .

ignorar cambio de espacio
ignorar todo el espacio
ignorar el espacio en el eol
ignorar-cr-at-eol
Trata las líneas con el tipo indicado de cambio de espacio en blanco como sin cambios por el bien de una combinación de tres vías. Los cambios de espacios en blanco mezclados con otros cambios en una línea no se ignoran. Ver también git-diff [1] -b , -w, --ignore-space-at-eol, y --ignore-cr-at-eol.

Si su versión solo introduce cambios de espacio en blanco en una línea, se usa nuestra versión;

Si nuestra versión introduce cambios en el espacio en blanco pero su versión incluye un cambio sustancial, se utiliza su versión;

De lo contrario, la fusión procede de la manera habitual.

renormalizar
Esto ejecuta una verificación y salida virtuales de las tres etapas de un archivo al resolver una combinación de tres vías. Esta opción está diseñada para usarse cuando se combinan ramas con diferentes filtros limpios o reglas de normalización de fin de línea. Consulte "Fusión de sucursales con diferentes atributos de checkin / checkout" en gitattributes [5] para obtener más información.

no renormalizar
Desactiva la renormalizeopción. Esto anula la merge.renormalizevariable de configuración.

sin cambio de nombre
Desactive la detección de cambio de nombre. Esto anula la merge.renames variable de configuración. Véase también git-diff [1] --no-renames .

buscar-renombrar [= <n>]
Active la detección de cambio de nombre, configurando opcionalmente el umbral de similitud. Este es el valor predeterminado. Esto anula la variable de configuración merge.renames . Véase también git-diff [1] --find-renames .

rename-threshold = <n>
Sinónimo en desuso para find-renames=<n>.

subárbol [= <ruta>]
Esta opción es una forma más avanzada de estrategia de subárbol , donde la estrategia hace una conjetura sobre cómo se deben desplazar dos árboles para que coincidan entre sí al fusionar. En su lugar, la ruta especificada tiene un prefijo (o se elimina desde el principio) para hacer que la forma de dos árboles coincida.

pulpo
Esto resuelve los casos con más de dos cabezas, pero se niega a realizar una combinación compleja que necesita resolución manual. Está destinado principalmente para ser usado para agrupar los jefes de rama de tema juntos. Esta es la estrategia de fusión predeterminada al extraer o fusionar más de una rama.

la nuestra
Esto resuelve cualquier número de cabezas, pero el árbol resultante de la fusión es siempre el de la rama de rama actual, ignorando efectivamente todos los cambios de todas las demás ramas. Está destinado a ser usado para reemplazar el antiguo historial de desarrollo de las ramas laterales. Tenga en cuenta que esto es diferente de la opción -Tours a la estrategia de combinación recursiva .

subárbol
Esta es una estrategia recursiva modificada. Al fusionar los árboles A y B, si B corresponde a un subárbol de A, B se ajusta primero para que coincida con la estructura de árbol de A, en lugar de leer los árboles al mismo nivel. Este ajuste también se hace al árbol de antepasado común.

Con las estrategias que usan la combinación de 3 vías (incluido el valor predeterminado, recursivo ), si se realiza un cambio en ambas ramas, pero luego se revierte en una de las ramas, ese cambio estará presente en el resultado combinado; Algunas personas encuentran este comportamiento confuso. Ocurre porque solo se consideran las cabezas y la base de fusión al realizar una fusión, no las confirmaciones individuales. Por lo tanto, el algoritmo de fusión considera el cambio revertido como ningún cambio y sustituye la versión modificada.

NOTAS
Debe comprender las implicaciones de usar git rebase en un repositorio que comparte. Consulte también RECUPERACIÓN DE LA REBASE DE UPSTREAM a continuación.

Cuando se ejecuta el comando git-rebase, primero se ejecutará un gancho "pre-rebase" si existe uno. Puede usar este gancho para hacer comprobaciones de sanidad y rechazar el rebase si no es apropiado. Por favor, vea la plantilla de script de enganche de pre-rebase para un ejemplo

Al finalizar, <branch> será la rama actual.

MODO INTERACTIVO
Cambiar de forma interactiva significa que tiene la oportunidad de editar las confirmaciones que se rebasan. Puede reordenar las confirmaciones y eliminarlas (eliminando parches malos o no deseados).

El modo interactivo está diseñado para este tipo de flujo de trabajo:

tener una idea maravillosa

hackear el código

preparar una serie para su presentación

enviar

donde el punto 2. consiste en varias instancias de

a) uso regular

Terminar algo digno de un compromiso.

cometer

b) reparación independiente

darse cuenta de que algo no funciona

Arregla eso

cometerlo

A veces lo arreglado en b.2. no se puede enmendar para corregirlo, ya que ese compromiso está enterrado profundamente en una serie de parches. Eso es exactamente para lo que se utiliza la rebase interactiva: utilícela después de un montón de "a" sy "b" s, reorganizando y editando confirmaciones y aplastando las confirmaciones múltiples en una.

Comience con la última confirmación que desea conservar tal cual:

git rebase -i <después-comisionado>
Se activará un editor con todas las confirmaciones en su rama actual (ignorando las confirmaciones de combinación), que vienen después de la confirmación dada. Puede reordenar las confirmaciones en esta lista al contenido de su corazón y puede eliminarlas. La lista se parece más o menos a esto:

pick deadbee El oneline de este commit
pick fa1afe1 La línea de la próxima confirmación
...
Las descripciones en línea son puramente para su placer; git rebase no los verá, sino los nombres de confirmación ("deadbee" y "fa1afe1" en este ejemplo), así que no borre ni edite los nombres.

Al reemplazar el comando "pick" con el comando "editar", puede decirle a git rebase que se detenga después de aplicar ese commit, para que pueda editar los archivos y / o el mensaje de commit, enmendar el commit y continuar el rebasado.

Para interrumpir la rebase (como lo haría un comando de "edición", pero sin seleccionar primero ninguna confirmación), use el comando "romper".

Si solo desea editar el mensaje de confirmación para una confirmación, reemplace el comando "pick" con el comando "reword".

Para eliminar una confirmación, reemplace el comando "pick" con "drop", o simplemente elimine la línea correspondiente.

Si desea plegar dos o más confirmaciones en una, reemplace el comando "pick" para la segunda y subsiguientes confirmaciones con "squash" o "fixup". Si las confirmaciones tenían diferentes autores, la confirmación plegada se atribuirá al autor de la primera confirmación. El mensaje de confirmación sugerido para la confirmación plegada es la concatenación de los mensajes de confirmación de la primera confirmación y de aquellos con el comando "squash", pero omite los mensajes de confirmación de confirmaciones con el comando "fixup".

git rebase se detendrá cuando "pick" haya sido reemplazado por "edit" o cuando un comando falle debido a errores de fusión. Cuando haya terminado de editar y / o resolver conflictos, puede continuar con git rebase --continue.

Por ejemplo, si desea reordenar las últimas 5 confirmaciones, de modo que lo que era HEAD ~ 4 se convierta en la nueva HEAD. Para lograrlo, deberías llamar a git rebase así:

$ git rebase -i HEAD ~ 5
Y mueve el primer parche al final de la lista.

Es posible que desee conservar las fusiones, si tiene un historial como este:

           X
            \
         A --- M --- B
        /
--- o --- O --- P --- Q
Supongamos que desea cambiar la base de la rama lateral que comienza en "A" a "Q". Asegúrese de que la CABEZA actual sea "B" y llame

$ git rebase -i -p --onto QO
Reordenar y editar confirmaciones generalmente crea pasos intermedios no probados. Es posible que desee verificar que la edición de su historial no rompió nada al ejecutar una prueba, o al menos la compilación en puntos intermedios en el historial mediante el comando "exec" (acceso directo "x"). Puedes hacerlo creando una lista de tareas como esta:

elegir Deadbee Implementar la función XXX
fixup f1a5c00 Fix to feature XXX
hacer ejecutivo
pick c0ffeee La línea de la próxima confirmación
edit deadbab el oneline del commit despues
exec cd subdir; hacer la prueba
...
El rebase interactivo se detendrá cuando un comando falle (es decir, salga con un estado distinto de 0) para darle la oportunidad de solucionar el problema. Puedes continuar con git rebase --continue.

El comando "exec" inicia el comando en un shell (el que está especificado en $SHELL, o el shell predeterminado si $SHELLno está configurado), por lo que puede usar las características del shell (como "cd", ">", ";" ...). El comando se ejecuta desde la raíz del árbol de trabajo.

$ git rebase -i - exec "make test"
Este comando le permite verificar que las confirmaciones intermedias son compilables. La lista de tareas se convierte así:

elegir 5928aea uno
prueba ejecutiva
elige 04d0fda dos
prueba ejecutiva
recoger ba46169 tres
prueba ejecutiva
recoger f4593f9 cuatro
prueba ejecutiva
COMPROMISOS DE DIVIDIR
En modo interactivo, puede marcar las confirmaciones con la acción "editar". Sin embargo, esto no significa necesariamente que git rebase espera que el resultado de esta edición sea exactamente un compromiso. De hecho, puede deshacer la confirmación o puede agregar otras confirmaciones. Esto se puede usar para dividir un commit en dos:

Comience una rebase interactiva con git rebase -i <commit>^, donde < comité > es el compromiso que desea dividir. De hecho, cualquier rango de compromiso funcionará, siempre que contenga ese compromiso.

Marque la confirmación que desea dividir con la acción "editar".

Cuando se trata de editar ese commit, ejecútalo git reset HEAD^. El efecto es que la CABEZA se rebobina en uno, y el índice sigue su ejemplo. Sin embargo, el árbol de trabajo se mantiene igual.

Ahora agregue los cambios al índice que desea tener en la primera confirmación. Puedes usar git add(posiblemente de manera interactiva) o git gui (o ambos) para hacer eso.

Confirme el índice actual con cualquier mensaje de confirmación que sea apropiado ahora.

Repita los dos últimos pasos hasta que su árbol de trabajo esté limpio.

Continuar la rebase con git rebase --continue.

Si no está absolutamente seguro de que las revisiones intermedias sean coherentes (compilan, pasan el testuite, etc.), debe usar git stash para esconder los cambios aún no confirmados después de cada confirmación, prueba y enmienda de la confirmación si las correcciones son necesarios.

RECUPERANDO DE LA REBASE DE UPSTREAM
Reemplazar (o cualquier otra forma de reescritura) una rama en la que otros han basado en el trabajo es una mala idea: cualquier persona que esté más abajo se vea obligada a corregir manualmente su historial. Esta sección explica cómo hacer la corrección desde el punto de vista del flujo descendente. La solución real, sin embargo, sería evitar volver a basar el flujo ascendente en primer lugar.

Para ilustrar, suponga que se encuentra en una situación en la que alguien desarrolla una rama de subsistema y está trabajando en un tema que depende de este subsistema . Podría terminar con una historia como la siguiente:

    o --- o --- o --- o --- o --- o --- o --- o master
	 \
	  o --- o --- o --- o --- o subsistema
			   \
			    * --- * --- * tema
Si el subsistema se rebasa contra el maestro , ocurre lo siguiente:

    o --- o --- o --- o --- o --- o --- o --- o master
	 \ \
	  o --- o --- o --- o --- o o '- o' - o '- o' - o 'subsistema
			   \
			    * --- * --- * tema
Si ahora continúa con el desarrollo como de costumbre y eventualmente fusiona el tema con el subsistema , las confirmaciones del subsistema permanecerán duplicadas para siempre:

    o --- o --- o --- o --- o --- o --- o --- o master
	 \ \
	  o --- o --- o --- o --- o o '- o' - o '- o' - o '- o' - subsistema M
			   \ /
			    * --- * --- * -..........- * - * tema
Dichos duplicados generalmente son mal vistos porque saturan la historia, lo que dificulta su seguimiento. Para limpiar las cosas, necesita trasplantar las confirmaciones sobre el tema a la nueva sugerencia del subsistema , es decir, el tema de rebase . Esto se convierte en un efecto dominó : ¡cualquier persona que esté más abajo del tema también se verá obligada a cambiar de base, y así sucesivamente!

Hay dos tipos de correcciones, que se analizan en las siguientes subsecciones:

Caso fácil: los cambios son literalmente los mismos.
Esto sucede si la rebase del subsistema era una rebase simple y no tenía conflictos.

Estuche rígido: los cambios no son los mismos.
Esto sucede si la reorganización del subsistema tuvo conflictos, o se usó --interactivepara omitir, editar, suprimir, o realizar correcciones; o si la corriente arriba utiliza uno de commit --amend, reseto filter-branch.

El caso facil
Solo funciona si los cambios (identificaciones de parches basados ​​en los contenidos de diff) en el subsistema son literalmente los mismos antes y después de que lo hiciera el subsistema de rebase .

En ese caso, la solución es fácil porque git rebase sabe que debe omitir los cambios que ya están presentes en el nuevo upstream. Así que si dices (asumiendo que estás en el tema )

    $ git subsistema de rebase
terminarás con la historia fija

    o --- o --- o --- o --- o --- o --- o --- o master
				 \
				  o 
