function validaCampo() {
	if (document.cadastro.nome.value == "") {
		alert("O Campo 'Nome do Acampante' é obrigatório!");
		return false;
	}

	if (document.cadastro.equipe.value == 'Selecione...') {
		alert("O Campo Equipe é obrigatório!");
		return false;
	}

	if (document.cadastro.conta.value == "") {
		alert("O Campo 'Valor a ser depositado' é obrigatório!");
		return false;
	}

	return true;
}

function SomenteNumero(e) {
	var tecla = window.event ? event.keyCode : e.which;

	if ((tecla >= 48 && tecla <= 57)) {
		return true;
	}

	if (tecla == 8 || tecla == 0 || tecla == 188 || tecla == 46 || tecla == 44) {
		return true;
	}

	return false;
}

function FormatCurrency(ctrl) {
		// Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
		var key = event.keyCode;
		if (key >= 36 && key <= 40 || key == 188 || key == 190 || key == 17) {
				return;
		}

		var val = ctrl.value;
		val = val.replace(/\./, "")
		ctrl.value = "";
		val += '';
		x = val.split(',');
		x1 = x[0];
		x2 = x.length > 1 ? ',' + x[1] : '';

		var rgx = /(\d+)(\d{3})/;

		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + '.' + '$2');
		}

		ctrl.value = x1 + x2;
}
