<fieldset style="width:70%; margin-left: 10%;">
    <legend style="background-color: #EEEEEE;">Cadastro de Departamentos</legend>

    <form class="form-horizontal" method="post" action="departamentos" id="frmDepartamentos" name="frmDepartamentos">
        <input type="hidden" id="hdnId" name="hdnId">
        <input type="hidden" id="hdnAcao" name="hdnAcao">
        <div class="control-group">
            <label class="control-label" for="txtDepartamento">Nome do departamento:</label>
            <div class="controls">
                <input type="text" id="txtDepartamento" name="nom_departamento" maxlength="50">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="button" class="btn" onclick="acao('salvar','frmDepartamentos','')">Salvar</button>
            </div>
        </div>
    </form>

    <hr>
    <div style="height:300px; overflow-y: auto; border:1px solid #DDDDDD;">
        <table class="table table-hover">
            <thead style="background-color: #EEEEEE;">
                <tr>
                    <th style="width:5%" colspan="2" align="center">Ação</th>
                    <th style="width:95%">Nome</th>
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
                        <td onclick="acao('excluir','frmDepartamentos', '<?php echo $row->id_departamento; ?>')"><?php echo $excluir; ?></td>
                        <td onclick="acao('alterar','frmDepartamentos', '<?php echo $row->id_departamento; ?>')"><?php echo $alterar; ?></td>
                        <td><?php echo $row->nom_departamento; ?></td>
                    </tr>

                    <?php
                }
                ?>

            </tbody>
        </table>
    </div> 

</fieldset>