<fieldset style="width:70%;">
  <legend style="background-color: #EEEEEE;">&nbsp;Filtros para pesquisa de salas disponíveis</legend>

  <form method="post" action="blocos" id="frmBlocos" name="frmBlocos">

    <div class="controls controls-row">

      <label class="control-label span2" for="cmbTipLoc" style="float:left; text-align:right;">Tipo de locação:</label>
      <select id="cmbTipLoc" name="cmbTipLoc" class="span2">
        <option value="">--Selecione--</option>
        <option value="1">1◦ Semestre</option>
        <option value="2">2◦ Semestre</option>
        <option value="3">Por período</option>
      </select>

      <label class="control-label span2" for="cmbTurno" style="float:left; text-align:right;">Turno:</label>
      <select id="cmbTurno" name="cmbTurno" class="span2">
        <option value="">--Selecione--</option>
        <option value="1">Manhã</option>
        <option value="2">Tarde</option>
        <option value="3">Noite</option>
      </select>
    </div>

    <div class="controls controls-row">
      <label class="control-label span2" for="cmbDiasSemana" style="float:left; text-align:right;">Dias da semana:</label>
      <select id="cmbDiasSemana" name="cmbDiasSemana" class="span2" multiple="multiple" style="height:130px;">
        <option value="1">Domingo</option>
        <option value="2">Segunda</option>
        <option value="3">Terça</option>
        <option value="4">Quarta</option>
        <option value="5">Quinta</option>
        <option value="6">Sexta</option>
        <option value="7">Sábado</option>
      </select>

      <label class="control-label span2" for="cmbPeriodo" style="float:left; text-align:right;">Ano:</label>
      <select id="cmbPeriodo" name="cmbPeriodo" class="span2">
        <option value="0">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
      </select>
    </div>

    <div class="controls controls-row">
      <label class="control-label span2" for="perDe" style="float:left; text-align:right;">Período de:</label>
      <input id="perDe" name="perDe" class="span2" type="text" placeholder="dd/mm/yyyy">
      <label class="control-label" for="perAte" style="float:left; text-align:right; margin:0 10px 0 10px;">Até:&nbsp;</label>
      <input id="perAte" name="perAte" class="span2" type="text" placeholder="dd/mm/yyyy">&nbsp;
      <span class="label label-warning">Disponível apenas quando tipo de locação for por período</span>
    </div>

    <div class="control-label" style="text-align: center;">
      <button type="button" class="btn-primary">Pesquisar</button>
    </div>

  </form>

  <div style="height:300px; overflow-y: auto; border:1px solid #DDDDDD;">
    <table class="table table-hover">
      <thead style="background-color: #EEEEEE;">
        <tr>
          <th style="width:5%" align="center" colspan="2">Ação</th>
          <th style="width:5%">Bloco</th>
          <th style="width:5%">Sala</th>
          <th style="width:15%">Capacidade</th>
          <th style="width:20%">Número Computadores</th>
          <th style="width:15%">Características</th>
          <th style="width:15%">Locada por</th>
          <th style="width:15%">Para o Professor</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $this->load->helper('html');
        $img_locar = array(
            'src' => 'assets/img/png/glyphicons_343_thumbs_up.png',
            'width' => '15px',
            'height' => '15px',
            'style' => 'cursor:pointer',
            'title' => 'Alocar',
        );

        $img_desalocar = array(
            'src' => 'assets/img/png/glyphicons_344_thumbs_down.png',
            'width' => '15px',
            'height' => '15px',
            'style' => 'cursor:pointer',
            'title' => 'Deslocar',
        );

        $alocar = img($img_locar);
        $desalocar = img($img_desalocar);

        foreach ($linhas->result() as $row) {
          ?>

          <tr>
            <td onclick="acao('alterar', 'frmBlocos', '<?php echo $row->id_sala; ?>')"><?php echo $alocar; ?></td>
            <td onclick="acao('alterar', 'frmBlocos', '<?php echo $row->id_sala; ?>')"><?php echo $desalocar; ?></td>
            <td align="center"><?php echo $row->cod_bloco; ?></td>
            <td><?php echo $row->nom_sala; ?></td>
            <td><?php echo $row->num_capacidade; ?></td>
            <td><?php echo $row->num_computadores; ?></td>
            <td><?php echo $row->dsc_caracteristicas; ?></td>
            <td><?php echo 'Sala Livre'; ?></td>
            <td>
              <select id="cmbProf" name="cmbProf" style="width:90%;">
                <option value="0">--Selecione--</option>
                <option value="2014">William</option>
                <option value="2015">David</option>
                <option value="2016">Marcelo</option>
              </select>
            </td>
          </tr>

          <?php
        }
        ?>

      </tbody>
    </table>
  </div> 








</fieldset>