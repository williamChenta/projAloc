<fieldset style="width:70%;">
    <legend style="background-color: #EEEEEE;">Cadastro de Blocos</legend>

    <form class="form-horizontal" method="post" action="blocos" id="frmBlocos" name="frmBlocos">
        <input type="hidden" id="hdnId" name="hdnId">
        <input type="hidden" id="hdnAcao" name="hdnAcao">
        <div class="control-group">
            <label class="control-label" for="txtCodigo">Código:</label>
            <div class="controls">
              <input type="text" id="txtCodigo" name="cod_bloco" maxlength="2">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txtDescricao">Descrição:</label>
            <div class="controls">
                <input type="text" id="txtDescricao" name="desc_bloco" maxlength="50">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="button" class="btn" onclick="acao('salvar','frmBlocos','')">Salvar</button>
            </div>
        </div>
    </form>

    <hr>
    <div style="height:300px; overflow-y: auto; border:1px solid #DDDDDD;">
        <table class="table table-hover">
            <thead style="background-color: #EEEEEE;">
                <tr>
                    <th style="width:5%" colspan="2" align="center">Ação</th>
                    <th style="width:10%">Código</th>
                    <th style="width:85%">Descrição</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $this->load->helper('html');
                $img_trash = array(
                    'src' => 'assets/img/png/glyphicons_016_bin.png',
                    'width' => '15',
                    'height' => '15',
                    'style' => 'cursor:pointer',
                    'title' => 'Excluir',
                );

                $img_edit = array(
                    'src' => 'assets/img/png/glyphicons_030_pencil.png',
                    'width' => '15',
                    'height' => '15',
                    'style' => 'cursor:pointer',
                    'title' => 'Alterar',
                );

                $excluir = img($img_trash);
                $alterar = img($img_edit);

                foreach ($linhas->result() as $row) {
                    ?>

                    <tr>
                        <td onclick="acao('excluir','frmBlocos', '<?php echo $row->id_bloco; ?>')"><?php echo $excluir; ?></td>
                        <td onclick="acao('alterar','frmBlocos', '<?php echo $row->id_bloco; ?>')"><?php echo $alterar; ?></td>
                        <td><?php echo $row->cod_bloco; ?></td>
                        <td><?php echo $row->desc_bloco; ?></td>
                    </tr>

                    <?php
                }
                ?>

            </tbody>
        </table>
    </div> 

</fieldset>