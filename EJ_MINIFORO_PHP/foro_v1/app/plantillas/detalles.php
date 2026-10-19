<div>
<b> Detalles:</b><br>
<table>
<tr><td>Longitud:          </td><td><?= strlen($_REQUEST['comentario']) ?></td></tr>
<tr><td>Nº de palabras:    </td><td><?= str_word_count($_REQUEST['comentario']) ?></td></tr>
<tr><td>Letra + repetida:  </td><td><?= array_search(max(array_count_values(str_split($_REQUEST['comentario']))), array_count_values(str_split($_REQUEST['comentario']))) ?></td></tr>
<tr><td>Palabra + repetida:</td><td><?= array_search(max(array_count_values(str_word_count($_REQUEST['comentario'], true))), array_count_values(str_word_count($_REQUEST['comentario'], true))) ?></td></tr>
</table>
</div>

