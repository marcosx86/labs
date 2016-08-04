<!DOCTYPE html>
<html>
    <head>
        <script src="js/jquery.min.js"></script>
    </head>
    <body>
        <pre>
        <?php if (array_key_exists('nome', $_POST)) echo print_r($_POST); ?>
        </pre>
        <div id="conteudo">
            <div></div>
            <form action="" method="post">
                <div class="registros">
                    <div class="registro">
                        <input name="nome[]" type="text" />
                        <input name="ramal[]" type="text" />
                        <input type="button" value="+" />
                    </div>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>
        </div>
        <div></div>
        <script>
            function novoRegistro(){
                var registros = $('#conteudo .registros');
                var ultimo = registros.find('.registro').last();
                var novo = ultimo.clone();
                
                ultimo.find('input[type=button]').off().val('-').click(excluiRegistro);
                novo.find('input[type=text]').val('');
                novo.find('input[type=button]').click(novoRegistro);
                registros.append(novo);
            }
            
            function excluiRegistro(){
               $(this).parents('.registro').remove();
            }
            
            function formCleanup(){
                $('#conteudo .registros .registro').each(function(idx, el){
                    el = $(el);
                    var nome = el.find('input[name="nome[]"]');
                    var ramal = el.find('input[name="ramal[]"]');
                    if (nome.val().trim() == '' && ramal.val().trim() == '')
                       el.remove();
                });
                
                return true;
            }
            
            $(document).ready(function(){
                $('#conteudo .registros .registro input[type=button]').click(novoRegistro);
                $('#conteudo form').submit(formCleanup)
            });
        </script>
    </body>
</html>