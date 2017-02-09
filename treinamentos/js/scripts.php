


        <!--script para trazer as informacoes do botao finalizar para o modal-->
        <script>
        $(document).ready(function() { 
            $('#finalizar-modal').on('shown.bs.modal', function (event) {
        
                    var button = $(event.relatedTarget);
                    var id = button.data('finalizar');

                    var modal = $(this);
                    //modal.find('.modal-title').text('Finalizar treinamento ' + id + ' ?');
                    modal.find('#confirm_fin').attr('href', 'add.php?id=' + id + '&&ordem=2');
                    modal.find('#cancel').attr('href', 'index.php?id=' + id);
                });
        });
        </script>


        <?php if(isset($_GET['option'])): //so executa o codigo caso haja parametros ?> 

            <script>
                        //funcao para guardar a option selecionada apos o reload da pagina
                $(function() {
                    if (sessionStorage.getItem('filtro')) {
                        $("#filtro option").eq(sessionStorage.getItem('filtro')).prop('selected', true);
                    }

                    $("#filtro").on('change', function() {
                        sessionStorage.setItem('filtro', $('option:selected', this).index());
                    });

                });
            </script>

        <?php endif; ?>





