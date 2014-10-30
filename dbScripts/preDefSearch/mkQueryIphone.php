<?php $newQuery = mkQuery('produto', 'id_produto, nome_prod, preco', 'cod_categoria = 5 AND produtor LIKE ("%apple%")', 'nome_prod');
