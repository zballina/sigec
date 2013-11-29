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
 * Strings for component 'qtype_preg', language 'es_mx', branch 'MOODLE_25_STABLE'
 *
 * @package   qtype_preg
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['answerno'] = 'Respuesta {$a}';
$string['authoring_form_charset_flags'] = 'significado real (formato unificado)';
$string['authoring_form_charset_mode'] = 'Modo de visualización para clases de caracteres complejos';
$string['authoring_form_charset_userinscription'] = 'como se escribe en expresiones regulares';
$string['authoring_form_tree_horiz'] = 'horizontal';
$string['authoring_form_tree_vert'] = 'vertical';
$string['authoring_tool_explain_graph'] = 'explicar gráfica';
$string['authoring_tool_page_header'] = 'Herramientas de autoría';
$string['callout_big_number_node_error'] = 'El número {$a->addinfo} en la llamada es demasiado grande, no debería de ser mayor de 255.';
$string['c_at_end_of_pattern_node_error'] = 'Error de sintaxis: c al final del patrón';
$string['char_code_disallowed_node_error'] = 'Los puntos de código Unicode 0xd800 ... 0xdfff no están permitidos';
$string['char_code_too_big_node_error'] = 'El código de carcter {$a->addinfo} es demasiao grande.';
$string['charhintpenalty'] = 'Castigo para la pista del sigiente caracter';
$string['charhintpenalty_help'] = 'Castigo por obtener la pista de un-caracter. Típicamente será mayor que el castigo de pregunta habitual de Moodle (que aplica a cualquier intento de pregunta para contestar pregunta sin pistas). Estos castigos son mutuamente exclusivos.';
$string['circumflex_leaf_assert'] = 'inicio de la afirmación del asunto';
$string['condsubexpr_assert_expected_node_error'] = 'Afirmación o condición esperada.';
$string['condsubexpr_too_much_alter_node_error'] = 'Error de sintaxis: tres o más alternacias de nivel superior en la subexpresión condicional en posición desde  {$a->indfirst} hasta {$a->indlast}. Use paréntesis si desea incluir alternancias en expresiones-si (yes-expr) o expresiones-no (no-expr).';
$string['condsubexpr_zero_condition_node_error'] = 'Condición inválida (?(0).';
$string['correctanswer'] = 'Respuesta correcta';
$string['correctanswer_help'] = 'Escriba una respuesta correcta (no una expresión regular) para mostrar a los estudiantes. Si lo deja vacío, el motor de coincidencia tratará de generar una respuesta correcta por sí mismo, poniendo atención a obtener la más cercana a la respuesta del estudiante. Por ahora solamente el motor NFA puede generar respuestas correctas.';
$string['cx_should_be_ascii_node_error'] = 'c debería de ser seguida por un caracter ASCII';
$string['debugheading'] = 'Configuraciones para depurar (debug)';
$string['defaultenginedescription'] = 'Motor coincidente seleccionado por defecto al crear pregunta nueva';
$string['defaultenginelabel'] = 'Motor coincidente por defecto';
$string['defaultlangdescription'] = 'Idioma seleccionado por defecto al crear pregunta nueva';
$string['defaultlanglabel'] = 'Idioma por defecto';
$string['defaultnotationdescription'] = 'Notación seleccionada por defecto al crear pregunta nueva';
$string['defaultnotationlabel'] = 'Notación por defecto';
$string['define_node_cond_subexpr'] = '"define"-subexpresión condicional';
$string['description_accept_leaf_control'] = 'forzar coincidencia de subexpresión exitosa';
$string['description_alt'] = '{$a->firstoperand} o {$a->secondoperand}';
$string['description_alt_g'] = '{$a->g1} o {$a->g2}';
$string['description_alt_wcomma'] = '{$a->firstoperand} o {$a->secondoperand}';
$string['description_alt_wcomma_g'] = '{$a->g1} or {$a->g2';
$string['description_anycrlf_leaf_control'] = 'retorno de carro, alimentación de línea o retorno de carro seguido por alimentación de línea';
$string['description_any_leaf_control'] = 'cualquier secuencia de línea nueva Unicode';
$string['description_bsr_unicode_leaf_control'] = 'Cualquier secuencia de línea nueva Unicode';
$string['description_char'] = '<span style="color:blue">{$a->char}</span>';
$string['description_char1'] = 'caracter inicio de encabezado (SOH)';
$string['description_char10'] = 'caracter de escape de enlace de datos (DLE)';
$string['description_char18'] = 'caracter cancelar (CAN)';
$string['description_char19'] = 'caracter fin de medio (EM)';
$string['description_char1A'] = 'caracter sustituto (SUB)';
$string['description_char1B'] = 'escape (ESC)';
$string['description_char1C'] = 'caracter separador de archivo (FS)';
$string['description_char1D'] = 'caracter separador de grupo (GS)';
$string['description_char1E'] = 'caracter separador de registro (RS)';
$string['description_char1F'] = 'caracter separador de unidad (US)';
$string['description_char2'] = 'caracter inicio de texto (STX)';
$string['description_char20'] = 'espacio';
$string['description_char3'] = 'caracter fin de texto (ETX)';
$string['description_char4'] = 'caracter fin de transmisión (EOT)';
$string['description_char7'] = 'caracter campana (BEL)';
$string['description_char7F'] = 'caracter suprimir (DEL)';
$string['description_char8'] = 'caracter retroceso (BS)';
$string['description_char9'] = 'tabulación (HT)';
$string['description_charA'] = 'alimentación de línea (LF)';
$string['description_charB'] = 'tabulación vertical (VT)';
$string['description_charC'] = 'alimentación de formato (FF)';
$string['description_charD'] = 'caracter de retorno de carro (CR)';
$string['description_charflag_alnum'] = 'letra o dígito';
$string['description_charflag_alpha'] = 'letra';
$string['description_charflag_Arabic'] = 'Caracter arábigo';
$string['description_charflag_Armenian'] = 'Caracter armenio';
$string['description_charflag_ascii'] = 'caracter con códigos 0-127';
$string['description_charflag_Avestan'] = 'Caracter avestan';
$string['description_charflag_Balinese'] = 'Caracter balinés';
$string['description_charflag_Bamum'] = 'Caracter banum';
$string['description_charflag_Bengali'] = 'Caracter bengalí';
$string['description_charflag_Bopomofo'] = 'Caracter bopomofo';
$string['description_charflag_Braille'] = 'caracter Braille';
$string['description_charflag_Buginese'] = 'Caracter buginés';
$string['description_charflag_Buhid'] = 'Caracter buhid';
$string['description_charflag_C'] = 'otra propiedad unicode';
$string['description_charflag_Canadian_Aboriginal'] = 'Caracter aborígen canadiense';
$string['description_charflag_Carian'] = 'Caracter cariano';
$string['description_charflag_Cc'] = 'control';
$string['description_charflag_Cf'] = 'formato';
$string['description_charflag_Cham'] = 'Caracter cham';
$string['description_charflag_Cherokee'] = 'Caracter cheroki';
$string['description_charflag_Cn'] = 'no asignado';
$string['description_charflag_cntrl'] = 'caracter de control';
$string['description_charflag_Co'] = 'uso privado';
$string['description_charflag_Common'] = 'Caracter común';
$string['description_charflag_Coptic'] = 'Caracter cóptico';
$string['description_charflag_Cs'] = 'sustituto';
$string['description_charflag_Cuneiform'] = 'Caracter cuneiforme';
$string['description_charflag_Cypriot'] = 'Caracter chipriota';
$string['description_charflag_Cyrillic'] = 'Caracter cirílico';
$string['description_charflag_Deseret'] = 'Caracter Deseret';
$string['description_charflag_Devanagari'] = 'Caracter devanagari';
$string['description_charflag_digit'] = 'dígito decimal';
$string['description_charflag_dot'] = 'cualquier caracter';
$string['description_charflag_Egyptian_Hieroglyphs'] = 'Caracter jeroglífico egipcio';
$string['description_charflag_Ethiopic'] = 'Caracter etiope';
$string['description_charflag_Georgian'] = 'Caracter georgiano';
$string['description_charflag_Glagolitic'] = 'Caracter glagolítico';
$string['description_charflag_Gothic'] = 'Caracter gótico';
$string['description_charflag_graph'] = 'Caracter imprimible (excluyendo espacio)';
$string['description_charflag_Greek'] = 'Caracter griego';
$string['description_charflag_Gujarati'] = 'Caracter gujarati';
$string['description_charflag_Gurmukhi'] = 'Caracter gurmukhi';
$string['description_charflag_Han'] = 'Caracter han';
$string['description_charflag_Hangul'] = 'Caracter hangul';
$string['description_charflag_Hanunoo'] = 'Caracter hanunoo';
$string['description_charflag_Hebrew'] = 'Caracter hebreo';
$string['description_charflag_Hiragana'] = 'Caracter hiragana';
$string['description_charflag_Inherited'] = 'caracter heredado';
$string['description_charflag_Javanese'] = 'Caracter javanés';
$string['description_charflag_Kaithi'] = 'Caracter kaithi';
$string['description_charflag_Kannada'] = 'Caracter Kannada';
$string['description_charflag_Katakana'] = 'Caracter katakana';
$string['description_charflag_Khmer'] = 'Carcater Khmer';
$string['description_charflag_L'] = 'letra';
$string['description_charflag_Lao'] = 'Caracter lao';
$string['description_charflag_Latin'] = 'caracter latino';
$string['description_charflag_Limbu'] = 'Caracter limbu';
$string['description_charflag_Lisu'] = 'Caracter lisu';
$string['description_charflag_Ll'] = 'letra minúscula';
$string['description_charflag_Lm'] = 'letra modificadora';
$string['description_charflag_Lo'] = 'otra letra';
$string['description_charflag_lower'] = 'letra minúscula';
$string['description_charflag_Lu'] = 'letra MAYÚSCULA';
$string['description_charflag_M'] = 'marca';
$string['description_charflag_Malayalam'] = 'Caracter malayalam';
$string['description_charflag_Mc'] = 'marca que espacía';
$string['description_charflag_Me'] = 'marca que encierra';
$string['description_charflag_Meetei_Mayek'] = 'Caracter meetel mayek';
$string['description_charflag_Mn'] = 'marca que no espacía';
$string['description_charflag_Mongolian'] = 'Caracter mongol';
$string['description_charflag_Myanmar'] = 'Caracter myanmar';
$string['description_charflag_N'] = 'número';
$string['description_charflag_Nd'] = 'número decimal';
$string['description_charflag_Nko'] = 'Caracter Nko';
$string['description_charflag_Nl'] = 'número en letra';
$string['description_charflag_No'] = 'otro número';
$string['description_charflag_Ogham'] = 'Caracter ogham';
$string['description_charflag_Old_Italic'] = 'caracter itálico antiguo';
$string['description_charflag_Old_Persian'] = 'caracter persa antiguo';
$string['description_charflag_Old_Turkic'] = 'caracter turco antiguo';
$string['description_charflag_P'] = 'puntuación';
$string['description_charflag_Pc'] = 'puntuación conectora';
$string['description_charflag_Pd'] = 'puntuación guión';
$string['description_charflag_Pe'] = 'puntuación de cierre';
$string['description_charflag_Pf'] = 'puntuación final';
$string['description_charflag_Phoenician'] = 'caracter fenicio';
$string['description_charflag_Pi'] = 'puntuación inicial';
$string['description_charflag_Po'] = 'otra puntuación';
$string['description_charflag_print'] = 'caracter imprimible (incluyendo espacio)';
$string['description_charflag_punct'] = 'caracter imprimible (excluyendo letras, dígitos y espacio)';
$string['description_charflag_Rejang'] = 'Caracter rejang';
$string['description_charflag_Runic'] = 'caracter rúnico';
$string['description_charflag_S'] = 'símbolo';
$string['description_charflag_Samaritan'] = 'Caracter samaritano';
$string['description_charflag_Saurashtra'] = 'Caracter saurashtra';
$string['description_charflag_Sc'] = 'símbolo de divisa';
$string['description_charflag_Shavian'] = 'Símbolo shaviano';
$string['description_charflag_Sinhala'] = 'Símbolo sinhala';
$string['description_charflag_Sk'] = 'símbolo modificador';
$string['description_charflag_slashd'] = 'dígito decimal';
$string['description_charflag_Sm'] = 'símbolo matemático';
$string['description_charflag_So'] = 'otro símbolo';
$string['description_charflag_Sundanese'] = 'Caracter sudanés';
$string['description_charflag_Tagalog'] = 'Caracter tagalog';
$string['description_charflag_Tamil'] = 'Caracter tamil';
$string['description_charflag_Thai'] = 'Caracter Thai';
$string['description_charflag_Tibetan'] = 'Caracter tibetano';
$string['description_charflag_upper'] = 'letra MAYÚSCULA';
$string['description_charflag_Vai'] = 'Caracter vai';
$string['description_charflag_word'] = 'caracter palabra';
$string['description_charflag_Xan'] = 'cualquier caracter alfanumérico';
$string['description_charflag_xdigit'] = 'dígito hexadecimal';
$string['description_charflag_Z'] = 'separador';
$string['description_charflag_Zl'] = 'separador de línea';
$string['description_charflag_Zp'] = 'separador de párrafo';
$string['description_charflag_Zs'] = 'separador de espacio';
$string['description_circumflex'] = 'principio de la cadena';
$string['description_empty'] = 'nada';
$string['description_lf_leaf_control'] = 'solamente alimentación de línea';
$string['description_option_J'] = 'permitir nombres duplicados:';
$string['description_option_m'] = 'concordancia multilínea:';
$string['description_wordbreak'] = 'en un límite de palabra';
$string['description_wordbreak_neg'] = 'no en límite de palabra';
$string['engine'] = 'Motor de concordancia';
$string['esc_a_leaf_assert'] = '';
$string['exactmatch'] = 'Concordancia exacta';
$string['explain_any_char'] = 'Cualquier caracter de';
$string['explain_any_char_except'] = 'Cualquier caracter excepto';
$string['explain_from'] = 'desde';
$string['explain_not'] = 'no';
$string['explain_recursion'] = 'recursión';
$string['explain_to'] = 'hacia';
$string['explain_unknow_meta'] = 'meta desconocido';
$string['explain_unknow_node'] = 'nodo desconocido';
$string['hintnextchar'] = 'siguiente caracter correcto';
$string['hintnextlexem'] = 'siguiente correcto {$a}';
$string['langselect'] = 'Idioma';
$string['leaf_charset'] = 'conjunto de caracteres';
$string['leaf_charset_error'] = 'conjunto de caracteres incorrecto';
$string['leaf_charset_negative'] = 'conjunto de caracteres negativo';
$string['leaf_control'] = 'secuencia de control';
$string['leaf_options'] = 'modificador';
$string['leaf_recursion'] = 'recursión';
$string['node_alt'] = 'alternancia';
$string['node_concat'] = 'concadenación';
$string['node_error'] = 'Error de sintaxis';
$string['node_finite_quant'] = 'cuantificador finito';
$string['node_infinite_quant'] = 'cuantificador infinito';
$string['node_subexpr'] = 'subexpresión';
$string['notation'] = 'Notación de expresión regular';
$string['notation_native'] = 'Expresión regular';
$string['notation_pcreextended'] = 'Expresión regular (extendida)';
$string['objectname'] = 'pregunta';
$string['pluginname_help'] = '<p>Expresiones regulares son una forma de patrones de escritura para concordar con diferentes cadenas de texto. Usted puede usarla para verificar respuestas en dos formas: una expresión a concordar (coincidir) con una respuesta completa (usualmente correcta), o una expresión a concordar (coincidir) con una parte de la respuesta (que puede ser usada, por ejemplo, para detectar errores comunes y dar los comentarios apropiados).
</p><p>Esta pregunta usa la sintaxis de expresiones regulares compatibles-con-perl de PHP como su notación por defecto. Hay muchos tutoriales acerca de la creación y el uso de expresiones regulares; aquí hay un: <a href="http://www.phpfreaks.com/content/print/126">ejemplo</a>. Usted puede encontrar la sintaxis detallada de expresiones regulares aquí: <a href="http://www.nusphere.com/kb/phpmanual/reference.pcre.pattern.syntax.htm">manual de PHP</a>.
Tome nota de que Usted no debería de encerrar las expresiones regulares dentro de delimitadores ni tampoco especificar ningún modificador - Moodle lo hará por Usted.
</p><p>Usted también puede usar esta pregunta como la forma avanzada de respuesta-corta con pistas, ¡aún cuando usted no sepa ni jota acerca de expresiones regulares ! Simplemente seleccione  <b>Moodle respuestacorta</b> como la notación para sus preguntas.</p>';
$string['slash_at_end_of_pattern_node_error'] = 'Error de sintaxis: al final del patrón.';
$string['subexpression'] = 'Subexpresión';
$string['subexpr_node_subexpr'] = 'subexpresión';
$string['tobecontinued'] = '...';
$string['ungreedyquant'] = 'cuantificadores no-codiciosos';
$string['unknown_error_node_error'] = 'error desconocido';
$string['usecharhint'] = 'Permitir pista siguiente caracter';
