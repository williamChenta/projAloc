function closeUI() {
  setTimeout($.unblockUI, 20);
}

function acao(acao, frm, id) {

  if ($("#hdnAcao").val() != 'alterar') {
    $("#hdnId").val(id);
  }

  $("#hdnAcao").val(acao);

  switch (acao) {
    case "excluir":
      if (confirm("Deseja realmente excluir?")) {
        $("#" + frm).submit();
      }
      else {
        $("#hdnId").val('');
        $("#hdnAcao").val('');
      }
      break;
    case "alterar":
      switch (frm) {
        case "frmBlocos":
          carregaBloco(id);
          break;
        case "frmDepartamentos":
          carregaDepartamento(id);
          break;
        case "frmSalas":
          carregaSala(id);
          break;
      }
      break;
    default:
      $("#" + frm).submit();
      break;
  }
}

function carregaBloco(id) {
  $.ajax({
    type: "POST",
    url: "blocos/ajxCarregaBloco",
    data: {hdnId: id},
    dataType: "json",
    success: function(json) { //Se ocorrer tudo certo
      $("#hdnAcao").val('alterar');
      $("#hdnId").val(json.id_bloco);
      $("#txtCodigo").val(json.cod_bloco);
      $("#txtDescricao").val(json.desc_bloco);
    }
  });
}

function carregaDepartamento(id) {
  $.ajax({
    type: "POST",
    url: "departamentos/ajxCarregaDepartamento",
    data: {hdnId: id},
    dataType: "json",
    success: function(json) { //Se ocorrer tudo certo
      $("#hdnAcao").val('alterar');
      $("#hdnId").val(json.id_departamento);
      $("#txtDepartamento").val(json.nom_departamento);
    }
  });
}

function carregaSala(id) {
  $.ajax({
    type: "POST",
    url: "salas/ajxCarregaSala",
    data: {hdnId: id},
    dataType: "json",
    success: function(json) { //Se ocorrer tudo certo
      $("#hdnAcao").val('alterar');
      $("#hdnId").val(json.id_sala);
      $("#cmbBloco").val(json.bloco_id_bloco);
      $("#cmbDepartamento").val(json.departamento_id_departamento);
      $("#txtCodigo").val(json.cod_sala);
      $("#txtNomSala").val(json.nom_sala);
      $("#txtCapacidade").val(json.num_capacidade);
      $("#txtNumComp").val(json.num_computadores);
      $("#txtCaracteristicas").val(json.dsc_caracteristicas);

      $.blockUI({
        message: $('#cadastro'),
        css: {top: '10%', width: '40%', left: '30%'}
      });
    }
  });
}