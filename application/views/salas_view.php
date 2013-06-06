<div id="cadastro" style="display:none; width:100%; height:50%;">
  <fieldset>
    <legend class="small" style="background-color: #EEEEEE;">&nbsp;Cadastro de Salas</legend>

    <form class="form-horizontal" method="post" action="salas" id="frmSalas" name="frmSalas">
      <input type="text" id="hdnId" name="hdnId" style="display:none;">
      <input type="text" id="hdnAcao" name="hdnAcao" style="display:none;">
      <div class="control-group">
        <label class="control-label" for="cmbBloco">Bloco:</label>
        <div class="controls">
          <select id="cmbBloco" name="bloco_id_bloco">
            <option value="">--Selecione--</option>

            <?php
            foreach ($blocos->result() as $row) {
            ?>
              <option value="<?php echo $row->id_bloco; ?>"><?php echo $row->desc_bloco; ?></option>
            <?php
            }
            ?>

          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="cmbDepartamento">Departamento:</label>
        <div class="controls">
          <select id="cmbDepartamento" name="departamento_id_departamento">
            <option value="">--Selecione--</option>

            <?php
            foreach ($departamentos->result() as $row) {
              ?>

              <option value="<?php echo $row->id_departamento; ?>"><?php echo $row->nom_departamento; ?></option>

              <?php
            }
            ?>

          </select>
        </div>
      </div>    
      <div class="control-group">
        <label class="control-label" for="txtCodigo">Código:</label>
        <div class="controls">
          <input type="text" id="txtCodigo" name="cod_sala" maxlength="4">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="txtNomSala">Nome da sala:</label>
        <div class="controls">
          <input type="text" id="txtNomSala" name="nom_sala" maxlength="50">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="txtCapacidade">Capacidade:</label>
        <div class="controls">
          <input type="text" id="txtCapacidade" name="num_capacidade" maxlength="4">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="txtNumComp">Número de computadores:</label>
        <div class="controls">
          <input type="text" id="txtNumComp" name="num_computadores" maxlength="4">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="txtCaracteristicas">Características:</label>
        <div class="controls">
          <textarea id="txtCaracteristicas" name="dsc_caracteristicas" rows="3" maxlength="300"></textarea>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="button" class="btn" onclick="acao('salvar','frmSalas','')">Salvar</button>
          <button id="btnCancelar" type="button" class="btn" onclick="closeUI();">Cancelar</button>
        </div>
      </div>
    </form>
  </fieldset>
</div>

<!--Bloco da lista de salas-->
<div style="height:400px; overflow-y: auto; border:1px solid #DDDDDD; width:75%;">
  <table class="table table-hover">
    <thead style="background-color: #EEEEEE;">
      <tr>
        <th style="width:5%" colspan="2" align="center">Ação</th>
        <th>Bloco</th>
        <th>Departamento</th>
        <th>Sala</th>
        <th>Capacidade</th>
        <th>Número Computadores</th>
        <th>Características</th>
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
          <td onclick="acao('excluir', 'frmSalas', '<?php echo $row->id_sala; ?>')"><?php echo $excluir; ?></td>
          <td onclick="acao('alterar', 'frmSalas', '<?php echo $row->id_sala; ?>')"><?php echo $alterar; ?></td>
          <td><?php echo $row->desc_bloco; ?></td>
          <td><?php echo $row->nom_departamento; ?></td>
          <td><?php echo $row->nom_sala; ?></td>
          <td><?php echo $row->num_capacidade; ?></td>
          <td><?php echo $row->num_computadores; ?></td>
          <td><?php echo $row->dsc_caracteristicas; ?></td>
        </tr>

        <?php
      }
      ?>

    </tbody>
  </table>
</div>

<div style="text-align:right; padding: 10px; margin-right: 35px;">
  <button id="btnCadastro" type="button" class="btn" onclick="">Nova Sala</button>
</div>

<script>
  $(document).ready(function() {
    $('#btnCadastro').click(function() {
      
      $('#frmSalas')[0].reset();
      $.blockUI({
        message: $('#cadastro'),
        css: {top: '10%', width: '40%', left: '30%'}        
      });
    })
  });
</script>