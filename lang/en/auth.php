<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'auth', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = 'Plugins de autenticación disponibles';
$string['alternatelogin'] = 'Si introduce aquí una URL, se usará como página de ingreso al sitio. La página debería contener un formato cuya propiedad de acción está ajustada a <strong>\'{$a}\'</strong> y devuelve los campos <strong>nombredeusuario</strong> y <strong>contraseña</strong>.<br />Procure no introducir una URL incorrecta puesto que hacerlo supondrá su expulsión del sitio.<br />Deje el ajuste en blanco para utilizar la página de acceso por defecto.';
$string['alternateloginurl'] = 'URL de ingreso alternativo';
$string['auth_changepasswordhelp'] = 'Ayuda sobre cambio de contraseña';
$string['auth_changepasswordhelp_expl'] = 'Muestra ayuda a los usuarios que han perdido su contraseña {$a}. Esta opción puede mostrarse como añadidura o en lugar de la <strong>URL de cambio de contraseña</strong> o como un cambio de contraseña interno de Moodle.';
$string['auth_changepasswordurl'] = 'URL para cambio de contraseña';
$string['auth_changepasswordurl_expl'] = 'Especifique la URL a la que enviar a los usuarios que han perdido su contraseña {$a}. Seleccione <strong>No</strong> en la <strong>Página Usar página estándar de cambio de contraseña</strong>.';
$string['auth_changingemailaddress'] = 'Usted ha solicitado un cambio de dirección email, desde {$a->oldemail} a {$a->newemail}. Por razones de seguridad, le hemos enviado un mensaje de email a la nueva dirección para confirmar que usted es el titular. Su nueva dirección será actualizada una vez que abra este mensaje que le acabomos de enviar a esta nueva dirección.';
$string['auth_common_settings'] = 'Ajustes comunes';
$string['auth_data_mapping'] = 'Mapeado de datos';
$string['authenticationoptions'] = 'Opciones de autenticación';
$string['auth_fieldlock'] = 'Bloquear valor';
$string['auth_fieldlock_expl'] = '<p><b>Bloquear valor:</b> ISi se habilita, impedirá que los usuarios de Moodle y administradores editar directamente el campo. Use esta opción si Usted está manteniendo estos datos en el sistema de autenticación externo. </p>';
$string['auth_fieldlocks'] = 'Bloquear campos de usuario';
$string['auth_fieldlocks_help'] = '<p>Usted puede bloquear los campos de datos del usuario. Esto es útil para sitios donde los datos del usuario son mantenidos por los administradores manualmente quienes editan los registros de usuarios o suben usuarios empleando la característica de "Subir usuarios". Si Usted bloquea campos que son necesarios para Moodle, asegúrese que proporciona estos datos al crear cuentas de usuarios porque de lo contrario las cuentas serán imposibles de usar..</p><p>Considere configurar estos campos a  \'Desbloqueado si está vacío\' para evitar este problema.</p>';
$string['authinstructions'] = 'Déjelo vacío para que se muestren las instrucciones por defecto en la página de ingreso al sitio. Si desea proporcionar instrucciones específicas para ingresar al sitio, escríbalas aquí.';
$string['auth_invalidnewemailkey'] = 'Error: Si está intentando confirmar un cambio de dirección email. debe haber cometido un error al copiar la URL que le enviamos por email. Por favor, copie la dirección y pruebe de nuevo.';
$string['auth_multiplehosts'] = 'Es posible especificar múltiples servidores o direcciones (por ej. servidor1.com;servidor2.com;servidor3.com) o (xxx.xxx.xxx.xxx;xxx.xxx.xxx.xxx)';
$string['auth_outofnewemailupdateattempts'] = 'Ha hecho más intentos de los permitidos para actualizar su dirección email. Su solicitud de actualización ha sido cancelada.';
$string['auth_passwordisexpired'] = 'Su contraseña ha caducado ¿Desea cambiar su contraseña ahora?';
$string['auth_passwordwillexpire'] = 'Su contraseña caducará en {$a} días ¿Desea cambiar su contraseña ahora?';
$string['auth_remove_delete'] = 'Borrado completo';
$string['auth_remove_keep'] = 'Mantener interna';
$string['auth_remove_suspend'] = 'Suspender interna';
$string['auth_remove_user'] = 'Especifique qué hacer con una cuenta de usuario interna durante sincronización masiva cuando el usuario fue eliminado de la fuente externa. Únicamente los usuarios suspendidos son automáticamente revividos si ellos reaparecen en una fuente externa.';
$string['auth_remove_user_key'] = 'Usuario externo eliminado';
$string['auth_sync_script'] = 'Script de sincronización del Cron';
$string['auth_updatelocal'] = 'Actualizar datos locales';
$string['auth_updatelocal_expl'] = '<p><b>Actualizar datos locales:</b> Si está activado, el campo debe ser actualizado (con identificación externa) cada vez que el usuario entra o se produce una sincronización de usuarios. Los campos a actualizar localmente deberían ser bloqueados.</p>';
$string['auth_updateremote'] = 'Actualizar datos externos';
$string['auth_updateremote_expl'] = '<p><b>Actualizar datos externos:</b> Si está activado, la identificación externa será actualizada cuando se actualice el registro del usuario. Los campos deberían estar desbloqueados para poder editarlos.</p>';
$string['auth_updateremote_ldap'] = '<p><b>Note:</b> La actualización de datos LDAP externos requiere que usted ajuste los valores \'binddn\' y \'bindpw\' a un usuario con privilegios de edición de todos los registros de usuario. Por el momento, esto no preserva los atributos multi-valor, y eliminará los valores extra durante la actualización. </p>';
$string['auth_user_create'] = 'Habilitar creación por parte del usuario';
$string['auth_user_creation'] = 'Los nuevos usuarios (anónimos) pueden crear cuentas de usuario sobre el código externo de autenticación y confirmar vía correo electrónico. Si usted habilita esto, recuerde también configurar las opciones del módulo específico para la creación de usuario.';
$string['auth_usernameexists'] = 'El nombredeusuario seleccionado ya existe. Por favor, elija otro.';
$string['auto_add_remote_users'] = 'Añadir automáticamente usuarios remotos';
$string['changepassword'] = 'Cambiar contraseña URL';
$string['changepasswordhelp'] = 'Aquí puede especificar dónde pueden sus usuarios recuperar o cambiar su nombredeusuario/contraseña si lo han olvidado. Para ello, aparecerá un botón en la página de ingreso. Si deja esto en blanco, este botón no se mostrará.';
$string['chooseauthmethod'] = 'Escoger un método de autenticación:';
$string['chooseauthmethod_help'] = '<p>Este menú le permite modificar el método de autenticación para este usuario en particular.</p> <p>Por favor, tenga cuidado porque este ajuste depende directamente de los métodos de autenticación que haya definido en el sitio, y de los ajustes que estén siendo utilizados.</p> <p>Una modificación incorrecta aquí podría impedir el ingreso de la persona al servidor o incluso el borrado de su cuenta de forma completa, así que, por favor, utilice esta opción si sabe qué es lo que está haciendo.</p>';
$string['createpasswordifneeded'] = 'Crear contraseña si es necesario';
$string['emailchangecancel'] = 'Cancelar cambio de email';
$string['emailchangepending'] = 'Cambio pendiente. Abra el enlace enviado en {$a->preference_newemail}.';
$string['emailnowexists'] = 'La dirección email que ha intentado asignar a su perfil ha sido asignada a otra persona. Su solicitud de cambio queda cancelada, pero puede intentarlo con otra dirección.';
$string['emailupdate'] = 'Actualizar dirección Email';
$string['emailupdatemessage'] = 'Estimado(a) {$a->fullname},

Ha solicitado un cambio de su dirección email en su cuenta de {$a->site}. Abra por favor la siguiente dirección en su navegador para confirmar este cambio.

{$a->url}';
$string['emailupdatesuccess'] = 'La dirección email del usuario <em>{$a->fullname}</em> ha sido actualizada con éxito a <em>{$a->email}</em>.';
$string['emailupdatetitle'] = 'Confirmación de actualización de email en {$a->site}';
$string['enterthenumbersyouhear'] = 'Escriba los números que oye';
$string['enterthewordsabove'] = 'Escriba las palabras de arriba';
$string['errormaxconsecutiveidentchars'] = 'Las contraseñas deben tener como máximo {$a} caracteres consecutivos idénticos';
$string['errorminpassworddigits'] = 'Las contraseñas deben tener al menos {$a} dígito(s).';
$string['errorminpasswordlength'] = 'Las contraseñas deben tener al menos una longitud de {$a} caracteres.';
$string['errorminpasswordlower'] = 'Las contraseñas deben tener al menos {$a} minúscula(s).';
$string['errorminpasswordnonalphanum'] = 'Las contraseñas deben tener al menos {$a} caracter(es) no alfanumérico(s) (como . $ ? / * - + # @).';
$string['errorminpasswordupper'] = 'Las contraseñas deben tener al menos {$a} MAYÚSCULA(S).';
$string['errorpasswordupdate'] = 'Error actualizando contraseña, la contraseña no ha cambiado';
$string['forcechangepassword'] = 'Forzar cambio de contraseña';
$string['forcechangepasswordfirst_help'] = 'Forzar a los usuarios a cambiar la contraseña la primera vez que ingresen a Moodle.';
$string['forcechangepassword_help'] = 'Forzar a los usuarios a cambiar la contraseña la próxima vez que ingresen a Moodle.';
$string['forgottenpassword'] = 'Si escribe aquí una URL, se usará como página de recuperación de la contraseña perdida para este sitio. Esto está pensado para sitios en los que las contraseñas se gestionan totalmente fuera de Moodle. Déjelo en blanco para usar la recuperación por defecto de la contraseña.';
$string['forgottenpasswordurl'] = 'URL contraseña olvidada';
$string['getanaudiocaptcha'] = 'Obtener un CAPTCHA de audio';
$string['getanimagecaptcha'] = 'Obtener un CAPTCHA de imagen';
$string['getanothercaptcha'] = 'Obtener otro CAPTCHA';
$string['guestloginbutton'] = 'Botón de ingreso para invitados';
$string['incorrectpleasetryagain'] = 'Incorrecto. Por favor, inténtelo de nuevo.';
$string['infilefield'] = 'Campo requerido en el archivo';
$string['informminpassworddigits'] = 'al menos {$a} dígito(s)';
$string['informminpasswordlength'] = 'al menos {$a} caracter(es)';
$string['informminpasswordlower'] = 'al menos {$a} minúscula(s)';
$string['informminpasswordnonalphanum'] = 'al menos {$a} caracter(es) no alfanumérico(s) (como . $ ? / * - + # @)';
$string['informminpasswordupper'] = 'al menos {$a} MAYÚSCULA(S)';
$string['informpasswordpolicy'] = 'La contraseña debería tener {$a}';
$string['instructions'] = 'Instrucciones';
$string['internal'] = 'Interno';
$string['locked'] = 'Bloqueado';
$string['md5'] = 'Encriptación MD5';
$string['nopasswordchange'] = 'La contraseña no puede cambiarse';
$string['nopasswordchangeforced'] = 'No puede seguir sin cambiar su contraseña, sin embargo no existe ninguna página disponible para cambiarla. Por favor contacte a su administrador de Moodle.';
$string['noprofileedit'] = 'El perfil no puede editarse';
$string['ntlmsso_attempting'] = 'Intentando registro único mediante NTLM...';
$string['ntlmsso_failed'] = 'Falló el ingreso automático; intente con la página de ingreso normal...';
$string['ntlmsso_isdisabled'] = 'NTLM SSO está desactivado.';
$string['passwordhandling'] = 'Gestión del campo de contraseña';
$string['plaintext'] = 'Texto plano';
$string['pluginnotenabled'] = 'El Plugin de autenticación \'{$a}\' no está activado.';
$string['pluginnotinstalled'] = 'El plugin de autenticación \'{$a}\' no está instalado';
$string['potentialidps'] = '¿Entra (se registra) habitualmente en otro sitio antes de llegar aquí? <br />Elija entre las opciones de la siguiente lista para entrar en su sitio habitual:';
$string['recaptcha'] = 'reCAPTCHA';
$string['recaptcha_help'] = 'El CAPTCHA se utiliza para impedir abusos de programas automáticos. Simplemente escriba las palabras en la caja, en orden y separadas por un espacio.

Si no está seguro de qué palabras son, puede conseguir otro CAPTCHA, o un CAPTCHA de audio.';
$string['selfregistration'] = 'Registrarse a sí mismo';
$string['selfregistration_help'] = 'Si se emplea un plugin de autenticación, como el auto-registro basado-en-email, entonces se habilita a los usuarios potenciales a que se registren a sí mismos y creen cuentas. Esto resultará en la posibilidad de que los spammers puedan crear cuentas para usarlas y mandar mensajes a foros, entradas de blogs y otros riesgos de spam. Para evitar este riesgo, el auto-registro debería estar deshabilitado o limitado a los <em>dominios de correo permitidos</em> en la configuración.';
$string['sha1'] = 'SHA-1 hash';
$string['showguestlogin'] = 'Puede ocultar o mostrar el botón de ingreso para invitados en la página de ingreso al sitio';
$string['stdchangepassword'] = 'Utilizar Página de cambio de contraseña estándar';
$string['stdchangepassword_expl'] = 'Si el sistema de autenticación externa permite cambios de contraseña en Moodle, seleccione Sí. Este ajuste pasa por alto \'Cambiar contraseña URL\'.';
$string['stdchangepassword_explldap'] = 'NOTA: Se recomienda que utilice LDAP sobre un túnel encriptado SSL (ldaps://) si el servidor LDAP es remoto.';
$string['suspended'] = 'Cuenta suspendida';
$string['suspended_help'] = 'Las cuentas de usuarios suspendidos no pueden entrar al sitio ni usar servicios web, y cualquier mensaje de salida a ellas es descartado.';
$string['unlocked'] = 'Desbloqueado';
$string['unlockedifempty'] = 'Desbloqueado si está vacío';
$string['update_never'] = 'Nunca';
$string['update_oncreate'] = 'Al crearse';
$string['update_onlogin'] = 'En cada ingreso';
$string['update_onupdate'] = 'Al actualizar';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() no admite el tipo de usuario seleccionado: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() no admite el tipo de usuario seleccionado (...aún)';
