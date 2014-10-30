<?php $newQuery = mkQuery('produto', 'id_produto, nome_prod, preco', 'cod_categoria = 4 AND tags LIKE ("%bateria%")', 'nome_prod');
